<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\SentEmail;
use App\Models\Scholarship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentTemplateEmail;

class ScholarshipEmailController extends Controller
{
    /**
     * Envía un correo electrónico a un contacto de beca basado en una plantilla.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $scholarshipId
     * @param  string  $identifier
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request, $scholarshipId, $identifier)
    {
        // Buscar beca
        $scholarship = Scholarship::findOrFail($scholarshipId);
        
        // Buscar plantilla por identificador
        $template = EmailTemplate::where('action_identifier', $identifier)
                                ->where('entity_type', 'scholarship')
                                ->firstOrFail();
        
        // Preparar el cuerpo del correo reemplazando variables
        $body = str_replace('{scholarship_contact_name}', $scholarship->contact_name, $template->body);
        $subject = str_replace('{scholarship_contact_name}', $scholarship->contact_name, $template->subject);
        
        try {
            // Enviar correo
            Mail::to($scholarship->contact_email)
                ->send(new StudentTemplateEmail(new \App\Models\User(), $subject, $body)); // Reutilizamos StudentTemplateEmail pero pasamos un User genérico.
            
            // Registrar envío exitoso
            SentEmail::updateOrCreate(
                [
                    'action_identifier' => $identifier,
                    'recipient_email' => $scholarship->contact_email,
                    'entity_type' => 'scholarship',
                    'entity_id' => $scholarship->id
                ],
                [
                    'student_id' => null,
                    'email_template_id' => $template->id,
                    'subject' => $subject,
                    'body' => $body,
                    'sent_at' => Carbon::now(),
                    'success' => true,
                    'error_message' => null
                ]
            );
            
            return response()->json([
                'success' => true,
                'message' => 'Correo enviado con éxito'
            ]);
            
        } catch (\Exception $e) {
            // Registrar error
            SentEmail::updateOrCreate(
                [
                    'action_identifier' => $identifier,
                    'recipient_email' => $scholarship->contact_email,
                    'entity_type' => 'scholarship',
                    'entity_id' => $scholarship->id
                ],
                [
                    'student_id' => null,
                    'email_template_id' => $template->id,
                    'subject' => $subject,
                    'body' => $body,
                    'sent_at' => Carbon::now(),
                    'success' => false,
                    'error_message' => $e->getMessage()
                ]
            );
            
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar el correo: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Verifica si un correo ya fue enviado a un contacto de beca.
     *
     * @param  int  $scholarshipId
     * @param  string  $identifier
     * @return \Illuminate\Http\Response
     */
    public function checkEmailStatus($scholarshipId, $identifier)
    {
        // Para las becas, necesitamos un identificador único para el registro de envío,
        // ya que sent_emails está diseñado para student_id. Podríamos usar el scholarship_id
        // en combination con el action_identifier y el recipient_email.
        
        // Podríamos guardar el scholarship_id en error_message o en un nuevo campo si es necesario
        // Por ahora, lo comprobamos por action_identifier y recipient_email
        $scholarship = Scholarship::findOrFail($scholarshipId);
        $sentEmail = SentEmail::where('action_identifier', $identifier)
                            ->where('entity_type', 'scholarship')
                            ->where('entity_id', $scholarship->id)
                            ->first();
                            
        return response()->json([
            'sent' => $sentEmail ? true : false,
            'success' => $sentEmail ? $sentEmail->success : null,
            'sent_at' => $sentEmail ? $sentEmail->sent_at : null
        ]);
    }
    
    /**
     * Obtiene el contenido de una plantilla de email para becas con placeholders procesados.
     *
     * @param  int  $scholarshipId
     * @param  string  $identifier
     * @return \Illuminate\Http\Response
     */
    public function getTemplateContent($scholarshipId, $identifier)
    {
        try {
            // Buscar beca
            $scholarship = Scholarship::findOrFail($scholarshipId);
            
            // Buscar plantilla por identificador
            $template = EmailTemplate::where('action_identifier', $identifier)
                                    ->where('entity_type', 'scholarship')
                                    ->firstOrFail();
            
            // Procesar placeholders específicos de becas
            $placeholders = [
                '{scholarship_contact_name}' => $scholarship->contact_name ?? '',
                '{scholarship_contact_email}' => $scholarship->contact_email ?? '',
                '{scholarship_contact_phone}' => $scholarship->contact_phone ?? '',
                '{scholarship_title}' => $scholarship->title ?? '',
                '{scholarship_description}' => $scholarship->description ?? '',
                '{scholarship_discount}' => $scholarship->discount_percentage ?? '0',
                '{scholarship_country}' => $scholarship->country ?? '',
                '{scholarship_foundation_notes}' => $scholarship->foundation_notes ?? '',
                '{scholarship_status}' => $scholarship->is_active ? 'Activa' : 'Inactiva',
                '{current_date}' => Carbon::now()->format('d/m/Y'),
                '{current_year}' => Carbon::now()->year,
            ];
            
            // Reemplazar placeholders en subject y body
            $processedSubject = str_replace(array_keys($placeholders), array_values($placeholders), $template->subject);
            $processedBody = str_replace(array_keys($placeholders), array_values($placeholders), $template->body);
            
            return response()->json([
                'success' => true,
                'subject' => $processedSubject,
                'body' => $processedBody,
                'template_id' => $template->id
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar la plantilla: ' . $e->getMessage()
            ], 500);
        }
    }
}

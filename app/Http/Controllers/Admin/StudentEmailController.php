<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\SentEmail;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentTemplateEmail;

class StudentEmailController extends Controller
{
    /**
     * Obtiene el contenido de una plantilla de correo electrónico con las variables reemplazadas.
     * Este método es llamado por AJAX para llenar el modal de envío.
     *
     * @param  \App\Models\User  $student
     * @param  string  $identifier
     * @return \Illuminate\Http\Response
     */
    public function getTemplateContent(\App\Models\User $student, $identifier)
    {
        $template = EmailTemplate::where('action_identifier', $identifier)
                                ->where('entity_type', 'student')
                                ->firstOrFail();

        // Obtener el último pedido del estudiante para los datos del curso y alojamiento
        // Asumiendo que el 'user_id' en la tabla 'orders' se corresponde con el 'id' del estudiante
        $order = Order::where('user_id', $student->id)
                                    ->latest()
                                    ->first();

        // Preparar las variables para el reemplazo
        $replacements = [
            '{regId}' => $student->id ?? '',
            '{regNombre}' => $student->name ?? '',
            '{regEmail}' => $student->email ?? '',
            '{regTelefono}' => $student->phone ?? '',
            '{regPasaporte}' => $student->passport ?? '',
            '{regDireccion}' => $student->address ?? '',
            '{regPais}' => $student->country ?? '',
            '{regCP}' => $student->postal_code ?? '',
            '{regCiudad}' => $student->city ?? '',
            '{regProvincia}' => $student->province ?? '',
            '{regIdioma}' => $student->language ?? '',
            '{regIdioma2}' => $student->second_language ?? '',
            
            // Variables para facturación y contabilidad
            '{currentBalance}' => number_format($student->current_balance ?? 0, 2, ',', '.'),
            '{totalCredits}' => number_format($student->total_credits ?? 0, 2, ',', '.'),
            '{totalDebits}' => number_format($student->total_debits ?? 0, 2, ',', '.'),
            '{regNivel}' => $student->level ?? '',
            '{regNacimiento}' => $student->birthdate ? $student->birthdate->format('d/m/Y') : '',
            '{regSexo}' => $student->sex ?? '',
            '{regNotas}' => $student->notes ?? '', // Asumiendo que Student tiene un campo notes, si no, verificar Order
            '{regSemanas}' => $order ? ($order->weeks ?? '') : '',
            '{regComienzo}' => $order && $order->start_date ? $order->start_date->format('d/m/Y') : '',
            '{regDestino}' => $order ? ($order->destination ?? '') : '',
            '{regCurso}' => $order ? ($order->course_type ?? '') : '',
            '{regAlojamiento}' => $order ? ($order->accommodation ?? '') : '',
            '{regTotal}' => $order && $order->total_amount ? number_format($order->total_amount, 2, ',', '.') . ' €' : '',
            '{regFecha}' => Carbon::now()->format('d/m/Y H:i:s'),
            
            // Variables de Alojamiento
            '{aloDireccion}' => $order ? ($order->address ?? '') : '', // Asumiendo que la dirección del alojamiento está en Order
            '{aloContacto}' => '', // No se encontró campo explícito en Order o Student, dejar vacío o buscar relación con Accomodation
            '{aloTelefono}' => $order ? ($order->phone_number ?? '') : '', // Asumiendo que el teléfono del alojamiento está en Order
            '{aloEmail}' => $order ? ($order->email ?? '') : '', // Asumiendo que el email del alojamiento está en Order
            '{aloMaps}' => $order ? 'https://www.google.com/maps/search/?api=1&query=' . urlencode(($order->address ?? '') . ', ' . ($order->city ?? '') . ', ' . ($order->country ?? '')) : '', // URL genérica de Google Maps
        ];

        // Generar la ficha completa (tabla de los datos de usuario + tabla de curso elegido)
        $regRegistroHtml = '';
        if ($student) {
            $regRegistroHtml .= '<table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse;">';
            $regRegistroHtml .= '<tr><td colspan="2" style="background-color:#f2f2f2;"><strong>Datos del Estudiante</strong></td></tr>';
            $regRegistroHtml .= '<tr><td>ID de Registro:</td><td>' . ($student->id ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Nombre:</td><td>' . ($student->name ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Email:</td><td>' . ($student->email ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Teléfono:</td><td>' . ($student->phone ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Pasaporte:</td><td>' . ($student->passport ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Dirección:</td><td>' . ($student->address ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>País:</td><td>' . ($student->country ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Código Postal:</td><td>' . ($student->postal_code ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Ciudad:</td><td>' . ($student->city ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Provincia:</td><td>' . ($student->province ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Idioma:</td><td>' . ($student->language ?? '') . '</td></tr>
            <tr><td>Segundo Idioma:</td><td>' . ($student->second_language ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Nivel de Español:</td><td>' . ($student->level ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Fecha de Nacimiento:</td><td>' . ($student->birthdate ? $student->birthdate->format('d/m/Y') : '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Sexo:</td><td>' . ($student->sex ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Notas:</td><td>' . ($student->notes ?? '') . '</td></tr>';
            $regRegistroHtml .= '</table><br>';
        }

        if ($order) {
            $regRegistroHtml .= '<table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse;">';
            $regRegistroHtml .= '<tr><td colspan="2" style="background-color:#f2f2f2;"><strong>Datos del Curso y Alojamiento</strong></td></tr>';
            $regRegistroHtml .= '<tr><td>Semanas de Duración:</td><td>' . ($order->weeks ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Fecha de Comienzo:</td><td>' . ($order->start_date ? $order->start_date->format('d/m/Y') : '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Destino:</td><td>' . ($order->destination ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Tipo de Curso:</td><td>' . ($order->course_type ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Tipo de Alojamiento:</td><td>' . ($order->accommodation ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Total a Pagar:</td><td>' . ($order->total_amount ? number_format($order->total_amount, 2, ',', '.') . ' €' : '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Dirección Alojamiento:</td><td>' . ($order->address ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Teléfono Alojamiento:</td><td>' . ($order->phone_number ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Email Alojamiento:</td><td>' . ($order->email ?? '') . '</td></tr>';
            $regRegistroHtml .= '<tr><td>Ubicación en Mapas:</td><td><a href="' . $replacements['{aloMaps}'] . '">Ver en Mapas</a></td></tr>';
            $regRegistroHtml .= '</table>';
        }
        $replacements['{regRegistro}'] = $regRegistroHtml;

        $subject = str_replace(array_keys($replacements), array_values($replacements), $template->subject);
        $body = str_replace(array_keys($replacements), array_values($replacements), $template->body);

        return response()->json([
            'success' => true,
            'subject' => $subject,
            'body' => $body
        ]);
    }

    /**
     * Envía un correo electrónico a un estudiante (MODIFICADO para aceptar asunto y cuerpo del modal).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $student
     * @param  string  $identifier
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request, \App\Models\User $student, $identifier)
    {
        // Obtener el asunto y el cuerpo del correo directamente de la solicitud (del modal)
        $subject = $request->input('subject');
        $body = $request->input('body');
        $ccEmail = $request->input('cc_email'); // Obtener dirección de CC

        // Buscar plantilla por identificador (solo para registrar el envío en SentEmail)
        $template = EmailTemplate::where('action_identifier', $identifier)
                                ->where('entity_type', 'student')
                                ->first(); // Usamos first() porque no es crítico si no se encuentra aquí

        try {
            // Enviar correo
            $mail = Mail::to($student->email);

            // Añadir CC si se proporcionó y es una dirección de correo válida
            if (!empty($ccEmail) && filter_var($ccEmail, FILTER_VALIDATE_EMAIL)) {
                $mail->cc($ccEmail);
            }

            $mail->send(new StudentTemplateEmail($student, $subject, $body));
            
            // Registrar envío exitoso
            SentEmail::updateOrCreate(
                [
                    'student_id' => $student->id,
                    'action_identifier' => $identifier,
                    'entity_type' => 'student',
                    'entity_id' => $student->id
                ],
                [
                    'email_template_id' => $template->id ?? null, // Usar null si la plantilla no se encontró
                    'recipient_email' => $student->email,
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
                    'student_id' => $student->id,
                    'action_identifier' => $identifier,
                    'entity_type' => 'student',
                    'entity_id' => $student->id
                ],
                [
                    'email_template_id' => $template->id ?? null,
                    'recipient_email' => $student->email,
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
     * Verifica si un correo ya fue enviado a un estudiante.
     *
     * @param  int  $studentId
     * @param  string  $identifier
     * @return \Illuminate\Http\Response
     */
    public function checkEmailStatus($studentId, $identifier)
    {
        $sentEmail = SentEmail::where('student_id', $studentId)
                            ->where('action_identifier', $identifier)
                            ->first();
                            
        return response()->json([
            'sent' => $sentEmail ? true : false,
            'success' => $sentEmail ? $sentEmail->success : null,
            'sent_at' => $sentEmail ? $sentEmail->sent_at : null
        ]);
    }
}

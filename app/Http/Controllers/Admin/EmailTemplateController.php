<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\Inquiry;
use App\Models\Grant;
use App\Models\SentEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class EmailTemplateController extends Controller
{
    protected function getEntityTypes()
    {
        return [
            'student'       => 'Estudiante',
            'scholarship'   => 'Beca',
            'accomodation'  => 'Alojamiento',
            'inquiry'       => 'Consulta individual',
            'grant'         => 'Concesión',
            'rate'          => 'Tarifa',
        ];
    }

    protected function getActionIdentifiers()
    {
        return [
            ''                          => 'Ninguno / General',
            'registration_confirmation' => 'Confirmación de registro',
            'payment_confirmation'      => 'Confirmación de pago',
            'payment_reminder'          => 'Recordatorio de pago',
            'welcome_email'             => 'Email de bienvenida',
            'details_info'              => 'Información de detalles',
            'update_notification'       => 'Notificación de actualización',
            'scholarship_awarded'       => 'Beca adjudicada',
            'scholarship_application'   => 'Solicitud de beca recibida',
        ];
    }

    public function index()
    {
        $templates = EmailTemplate::latest()->paginate(15);
        return view('admin.email_templates.index', compact('templates'));
    }

    public function create()
    {
        $emailTemplate = new EmailTemplate();
        $entityTypes = $this->getEntityTypes();
        $actionIdentifiers = $this->getActionIdentifiers();
        return view('admin.email_templates.create', compact('emailTemplate', 'entityTypes', 'actionIdentifiers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'entity_type' => 'required|string|max:100|in:' . implode(',', array_keys($this->getEntityTypes())),
            'action_identifier' => 'nullable|string|max:100|in:' . implode(',', array_keys($this->getActionIdentifiers())),
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.email-templates.create')
                            ->withErrors($validator)
                            ->withInput();
        }

        EmailTemplate::create($request->all());

        return redirect()->route('admin.email-templates.index')
                         ->with('success', 'Plantilla de email creada con éxito.');
    }

    public function show(EmailTemplate $emailTemplate)
    {
        return redirect()->route('admin.email-templates.edit', $emailTemplate->id);
    }

    public function edit(EmailTemplate $emailTemplate)
    {
        $entityTypes = $this->getEntityTypes();
        $actionIdentifiers = $this->getActionIdentifiers();
        return view('admin.email_templates.edit', compact('emailTemplate', 'entityTypes', 'actionIdentifiers'));
    }

    public function update(Request $request, EmailTemplate $emailTemplate)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'entity_type' => 'required|string|max:100|in:' . implode(',', array_keys($this->getEntityTypes())),
            'action_identifier' => 'nullable|string|max:100|in:' . implode(',', array_keys($this->getActionIdentifiers())),
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.email-templates.edit', $emailTemplate->id)
                            ->withErrors($validator)
                            ->withInput();
        }

        $emailTemplate->update($request->all());

        return redirect()->route('admin.email-templates.index')
                         ->with('success', 'Plantilla de email actualizada con éxito.');
    }

    public function destroy(EmailTemplate $emailTemplate)
    {
        try {
            $emailTemplate->delete();
            return redirect()->route('admin.email-templates.index')
                              ->with('success', 'Plantilla de email eliminada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('admin.email-templates.index')
                              ->with('error', 'Error al eliminar la plantilla de email: ' . $e->getMessage());
        }
    }

    public function getTemplateContent(Request $request, $templateIdentifier, $entityId)
    {
        $template = EmailTemplate::where('action_identifier', $templateIdentifier)->first();

        if (!$template) {
            return response()->json(['error' => 'Plantilla no encontrada.'], 404);
        }

        $entity = null;
        switch ($template->entity_type) {
            case 'inquiry':
                $entity = Inquiry::find($entityId);
                break;
            case 'grant':
                $entity = Grant::find($entityId);
                break;
            // Puedes añadir más casos para otras entidades si es necesario
        }

        if (!$entity) {
            return response()->json(['error' => 'Entidad asociada no encontrada.'], 404);
        }

        $placeholders = [
            '{fechaSol}' => $entity->created_at->format('d/m/Y H:i'),
            '{nombreSol}' => $entity->name,
            '{emailSol}' => $entity->email,
            '{telefonoSol}' => $entity->phone,
            '{paisSol}' => $entity->country,
            '{tituloSol}' => $entity->subject,
            '{mensajeSol}' => $entity->message,
        ];

        $processedSubject = str_replace(array_keys($placeholders), array_values($placeholders), $template->subject);
        $processedBody = str_replace(array_keys($placeholders), array_values($placeholders), $template->body);

        return response()->json([
            'success' => true,
            'subject' => $processedSubject,
            'body' => $processedBody,
        ]);
    }
    
    /**
     * Envía un email usando una plantilla genérica.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendTemplateEmail(Request $request)
    {
        $request->validate([
            'entity_type' => 'required|string|in:inquiry,grant',
            'entity_id' => 'required|integer',
            'template_id' => 'required|string',
            'subject' => 'required|string',
            'body' => 'required|string',
        ]);

        try {
            // Buscar la entidad según su tipo
            $entity = null;
            $recipientEmail = null;
            
            switch ($request->entity_type) {
                case 'inquiry':
                    $entity = Inquiry::findOrFail($request->entity_id);
                    $recipientEmail = $entity->email;
                    break;
                case 'grant':
                    $entity = Grant::findOrFail($request->entity_id);
                    $recipientEmail = $entity->email;
                    break;
                default:
                    return response()->json([
                        'success' => false,
                        'message' => 'Tipo de entidad no válido'
                    ], 400);
            }

            // Buscar la plantilla
            $template = EmailTemplate::where('action_identifier', $request->template_id)->first();
            if (!$template) {
                return response()->json([
                    'success' => false,
                    'message' => 'Plantilla no encontrada'
                ], 404);
            }

            // Enviar el email usando DynamicTemplateMail
            Mail::to($recipientEmail)->send(new \App\Mail\DynamicTemplateMail(
                $request->subject,
                $request->body
            ));

            // Registrar el envío
            SentEmail::create([
                'student_id' => null,
                'email_template_id' => $template->id,
                'action_identifier' => $request->template_id,
                'recipient_email' => $recipientEmail,
                'subject' => $request->subject,
                'body' => $request->body,
                'sent_at' => now(),
                'success' => true,
                'error_message' => null,
                'entity_type' => $request->entity_type,
                'entity_id' => $request->entity_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Email enviado con éxito'
            ]);

        } catch (\Exception $e) {
            // Registrar el error si es posible
            if (isset($template) && isset($recipientEmail)) {
                SentEmail::create([
                    'student_id' => null,
                    'email_template_id' => $template->id,
                    'action_identifier' => $request->template_id,
                    'recipient_email' => $recipientEmail,
                    'subject' => $request->subject,
                    'body' => $request->body,
                    'sent_at' => now(),
                    'success' => false,
                    'error_message' => $e->getMessage(),
                    'entity_type' => $request->entity_type,
                    'entity_id' => $request->entity_id
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Error al enviar el email: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Verifica el estado de envío de un email con plantilla.
     *
     * @param  string  $templateId
     * @param  int  $entityId
     * @return \Illuminate\Http\Response
     */
    public function checkTemplateEmailStatus($templateId, $entityId)
    {
        try {
            // Buscar la plantilla para obtener entity_type
            $template = EmailTemplate::where('action_identifier', $templateId)->first();
            
            if (!$template) {
                return response()->json([
                    'sent' => false,
                    'success' => null,
                    'sent_at' => null
                ]);
            }

            // Buscar la entidad para obtener el email
            $entity = null;
            $recipientEmail = null;
            
            switch ($template->entity_type) {
                case 'inquiry':
                    $entity = Inquiry::find($entityId);
                    $recipientEmail = $entity->email ?? null;
                    break;
                case 'grant':
                    $entity = Grant::find($entityId);
                    $recipientEmail = $entity->email ?? null;
                    break;
            }

            if (!$recipientEmail) {
                return response()->json([
                    'sent' => false,
                    'success' => null,
                    'sent_at' => null
                ]);
            }

            // Buscar el registro de envío
            $sentEmail = SentEmail::where('action_identifier', $templateId)
                                 ->where('entity_type', $template->entity_type)
                                 ->where('entity_id', $entityId)
                                 ->first();

            return response()->json([
                'sent' => $sentEmail ? true : false,
                'success' => $sentEmail ? $sentEmail->success : null,
                'sent_at' => $sentEmail ? $sentEmail->sent_at : null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'sent' => false,
                'success' => null,
                'sent_at' => null
            ]);
        }
    }
}
<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\SentEmail;
use App\Models\EmailTemplate;
use Carbon\Carbon;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 60;
    
    protected $recipientEmail;
    protected $subject;
    protected $body;
    protected $mailable;
    protected $templateId;
    protected $actionIdentifier;
    protected $entityType;
    protected $entityId;
    protected $studentId;

    /**
     * Create a new job instance.
     */
    public function __construct(
        string $recipientEmail,
        string $subject,
        string $body,
        $mailable,
        string $actionIdentifier,
        string $entityType = null,
        int $entityId = null,
        int $studentId = null,
        int $templateId = null
    ) {
        $this->recipientEmail = $recipientEmail;
        $this->subject = $subject;
        $this->body = $body;
        $this->mailable = $mailable;
        $this->templateId = $templateId;
        $this->actionIdentifier = $actionIdentifier;
        $this->entityType = $entityType;
        $this->entityId = $entityId;
        $this->studentId = $studentId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Enviar el email
            Mail::to($this->recipientEmail)->send($this->mailable);
            
            // Registrar envío exitoso
            $this->recordEmailSent(true, null);
            
        } catch (\Exception $e) {
            // Registrar error
            $this->recordEmailSent(false, $e->getMessage());
            
            // Re-lanzar la excepción para que Laravel maneje los reintentos
            throw $e;
        }
    }
    
    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        // Registrar fallo definitivo después de todos los reintentos
        $this->recordEmailSent(false, $exception->getMessage());
    }
    
    /**
     * Registra el estado del envío de email.
     */
    private function recordEmailSent(bool $success, string $errorMessage = null): void
    {
        $data = [
            'student_id' => $this->studentId,
            'email_template_id' => $this->templateId,
            'action_identifier' => $this->actionIdentifier,
            'recipient_email' => $this->recipientEmail,
            'subject' => $this->subject,
            'body' => $this->body,
            'sent_at' => Carbon::now(),
            'success' => $success,
            'error_message' => $errorMessage,
            'entity_type' => $this->entityType,
            'entity_id' => $this->entityId,
        ];
        
        // Crear o actualizar registro
        if ($this->entityType && $this->entityId) {
            SentEmail::updateOrCreate(
                [
                    'action_identifier' => $this->actionIdentifier,
                    'entity_type' => $this->entityType,
                    'entity_id' => $this->entityId
                ],
                $data
            );
        } else {
            SentEmail::updateOrCreate(
                [
                    'student_id' => $this->studentId,
                    'action_identifier' => $this->actionIdentifier
                ],
                $data
            );
        }
    }
}

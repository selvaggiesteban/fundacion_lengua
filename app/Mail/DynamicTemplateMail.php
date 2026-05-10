<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class DynamicTemplateMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $emailSubject;
    public string $emailBody;
    public ?string $fromAddress;
    public ?string $fromName;

    /**
     * Create a new message instance.
     *
     * @param string $emailSubject Asunto del email (ya procesado con placeholders)
     * @param string $emailBody Cuerpo HTML del email (ya procesado con placeholders)
     * @param string|null $fromAddress Email del remitente (opcional, si no se usa el global de .env)
     * @param string|null $fromName Nombre del remitente (opcional)
     */
    public function __construct(string $emailSubject, string $emailBody, ?string $fromAddress = null, ?string $fromName = null)
    {
        $this->emailSubject = $emailSubject;
        $this->emailBody = $emailBody;
        $this->fromAddress = $fromAddress;
        $this->fromName = $fromName;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        $envelope = new Envelope(
            subject: $this->emailSubject,
        );
        
        if ($this->fromAddress) {
            $envelope->from(new Address($this->fromAddress, $this->fromName ?? ''));
        }

        return $envelope;
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return new Content(
            htmlString: $this->emailBody,
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
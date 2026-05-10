<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class StudentTemplateEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * El estudiante a quien se enviará el correo.
     *
     * @var \App\Models\User
     */
    public $student;
    
    /**
     * El asunto del correo.
     *
     * @var string
     */
    public $emailSubject;
    
    /**
     * El cuerpo del correo.
     *
     * @var string
     */
    public $emailBody;

    /**
     * Create a new message instance.
     */
    public function __construct(User $student, string $subject, string $body)
    {
        $this->student = $student;
        $this->emailSubject = $subject;
        $this->emailBody = $body;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: $this->emailSubject,
        );
    }

    /**
     * Get the message content definition.
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

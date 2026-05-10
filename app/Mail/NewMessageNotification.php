<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Conversation;
use App\Models\Message;

class NewMessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $conversation;

    /**
     * Create a new message instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message->load('user');
        $this->conversation = $message->conversation->load('student', 'assignedAdmin', 'topic');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo Mensaje en Conversación: ' . $this->conversation->subject . ' (de ' . $this->message->user->name . ')',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new-message',
            with: [
                'message' => $this->message,
                'conversation' => $this->conversation,
            ],
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

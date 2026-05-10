<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Message;
use App\Models\Conversation;

class NewMessageAppNotification extends Notification
{
    use Queueable;

    public $message;

    /**
     * Create a new notification instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message->load('conversation.student', 'conversation.assignedAdmin', 'user');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $url = null;
        if ($notifiable->isStudent()) {
            $url = route('student.conversations.show', $this->message->conversation->id);
        } elseif ($notifiable->isAdmin() || $notifiable->isSuperAdmin()) {
            $url = route('admin.conversations.show', $this->message->conversation->id);
        }

        return [
            'message_id' => $this->message->id,
            'conversation_id' => $this->message->conversation->id,
            'sender_name' => $this->message->user->name,
            'message_body' => $this->message->message_body,
            'conversation_subject' => $this->message->conversation->subject,
            'url' => $url,
        ];
    }
}

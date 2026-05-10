<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Conversation;

class ConversationStatusUpdatedNotification extends Notification
{
    use Queueable;

    public $conversation;

    /**
     * Create a new notification instance.
     */
    public function __construct(Conversation $conversation)
    {
        $this->conversation = $conversation->load('student', 'assignedAdmin');
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
            $url = route('student.conversations.show', $this->conversation->id);
        } elseif ($notifiable->isAdmin() || $notifiable->isSuperAdmin()) {
            $url = route('admin.conversations.show', $this->conversation->id);
        }

        return [
            'conversation_id' => $this->conversation->id,
            'conversation_subject' => $this->conversation->subject,
            'new_status' => $this->conversation->status,
            'url' => $url,
        ];
    }
}

<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ConversationChat extends Component
{
    use WithFileUploads;

    public Conversation $conversation;
    public $newMessage = '';
    public $attachment;

    protected $rules = [
        'newMessage' => 'required_without:attachment|string|max:2000',
        'attachment' => 'nullable|file|max:2048', // 2MB Max
    ];

    protected $messages = [
        'newMessage.required_without' => 'El mensaje no puede estar vacío si no hay un adjunto.',
        'newMessage.max' => 'El mensaje no puede exceder los 2000 caracteres.',
        'attachment.max' => 'El archivo adjunto no puede ser mayor de 2MB.',
    ];

    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
        $this->conversation->load('messages.user');
    }

    public function sendMessage()
    {
        $this->validate();

        $message = new Message([
            'conversation_id' => $this->conversation->id,
            'user_id' => Auth::id(),
            'message_body' => $this->newMessage,
        ]);

        if ($this->attachment) {
            $message->attachment_path = $this->attachment->store('attachments', 'public');
        }

        $message->save();

        // Actualizar last_message_at en la conversación
        $this->conversation->last_message_at = now();
        $this->conversation->save();

        $this->reset(['newMessage', 'attachment']);
        $this->conversation->load('messages.user'); // Recargar mensajes para mostrarlos al instante
        
        // Emitir evento para scroll-to-bottom
        $this->dispatch('messageSent');
    }

    public function render()
    {
        return view('livewire.student.conversation-chat', [
            'messages' => $this->conversation->messages,
        ]);
    }
}

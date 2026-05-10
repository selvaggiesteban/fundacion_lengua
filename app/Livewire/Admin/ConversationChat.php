<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ConversationChat extends Component
{
    use WithFileUploads;

    public Conversation $conversation;
    public $newMessage = '';
    public $attachment;
    public $status = '';
    public $assignedAdminId = '';
    public $admins;

    protected $rules = [
        'newMessage' => 'required_without:attachment|string|max:2000',
        'attachment' => 'nullable|file|max:2048', // 2MB Max
        'status' => 'required|in:Abierto,Pendiente de respuesta del Estudiante,Pendiente de respuesta del Administrador,Resuelto,Cerrado',
        'assignedAdminId' => 'nullable|exists:users,id',
    ];

    protected $messages = [
        'newMessage.required_without' => 'El mensaje no puede estar vacío si no hay un adjunto.',
        'newMessage.max' => 'El mensaje no puede exceder los 2000 caracteres.',
        'attachment.max' => 'El archivo adjunto no puede ser mayor de 2MB.',
        'status.required' => 'El estado es obligatorio.',
        'status.in' => 'El estado seleccionado no es válido.',
        'assignedAdminId.exists' => 'El administrador asignado no es válido.',
    ];

    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
        $this->conversation->load(['messages.user', 'topic', 'student', 'assignedAdmin', 'tags']);
        $this->status = $conversation->status;
        $this->assignedAdminId = $conversation->assigned_admin_id;
        $this->admins = User::whereIn('role', [User::ROLE_ADMIN, User::ROLE_SUPERADMIN])->get();
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required_without:attachment|string|max:2000',
            'attachment' => 'nullable|file|max:2048',
        ], [
            'newMessage.required_without' => 'El mensaje no puede estar vacío si no hay un adjunto.',
            'newMessage.max' => 'El mensaje no puede exceder los 2000 caracteres.',
            'attachment.max' => 'El archivo adjunto no puede ser mayor de 2MB.',
        ]);

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

    public function updatedStatus($value)
    {
        $this->conversation->status = $value;
        if ($value === 'Cerrado') {
            $this->conversation->closed_at = now();
        } else {
            $this->conversation->closed_at = null;
        }
        $this->conversation->save();
        // TODO: Enviar notificación al estudiante sobre el cambio de estado
        $this->dispatch('statusUpdated');
    }

    public function updatedAssignedAdminId($value)
    {
        $this->conversation->assigned_admin_id = $value;
        $this->conversation->save();
        // TODO: Enviar notificación a los administradores o al estudiante si cambia la asignación
        $this->dispatch('adminAssigned');
    }

    public function render()
    {
        return view('livewire.admin.conversation-chat', [
            'messages' => $this->conversation->messages,
        ]);
    }
}

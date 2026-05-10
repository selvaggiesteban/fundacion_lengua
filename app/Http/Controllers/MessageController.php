<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use App\Mail\NewMessageNotification;
use App\Notifications\NewMessageAppNotification;

class MessageController extends Controller
{
    public function store(Request $request, Conversation $conversation)
    {
        $request->validate([
            'message_body' => 'required_without:attachment|string',
            'attachment' => 'nullable|file|max:2048', // Max 2MB
        ]);

        if (!$request->message_body && !$request->hasFile('attachment')) {
            return back()->withErrors(['message_body' => 'El mensaje o el adjunto son requeridos.']);
        }

        $message = new Message([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'message_body' => $request->message_body,
        ]);

        if ($request->hasFile('attachment')) {
            $message->attachment_path = $request->file('attachment')->store('attachments', 'public');
        }

        $message->save();

        // Actualizar last_message_at en la conversación
        $conversation->last_message_at = now();
        $conversation->save();

        // Enviar notificaciones por correo electrónico y en la aplicación al otro participante
        $recipient = null;
        if (Auth::user()->id === $conversation->student_id) {
            // El mensaje lo envía el estudiante, notificar al admin asignado o a todos los admins
            if ($conversation->assignedAdmin) {
                $recipient = $conversation->assignedAdmin;
            } else {
                // Si no hay admin asignado, notificar a todos los admins
                $admins = \App\Models\User::whereIn('role', [\App\Models\User::ROLE_ADMIN, \App\Models\User::ROLE_SUPERADMIN])->get();
                foreach ($admins as $admin) {
                    Mail::to($admin->email)->send(new NewMessageNotification($message));
                    $admin->notify(new NewMessageAppNotification($message));
                }
            }
        } else {
            // El mensaje lo envía un admin, notificar al estudiante
            $recipient = $conversation->student;
        }

        if ($recipient && $recipient->id !== Auth::id()) {
            Mail::to($recipient->email)->send(new NewMessageNotification($message));
            $recipient->notify(new NewMessageAppNotification($message));
        }

        return back()->with('success', 'Mensaje enviado correctamente.');
    }

    public function downloadAttachment(Message $message)
    {
        $user = Auth::user();
        $conversation = $message->conversation;

        // Asegurarse de que solo el estudiante de la conversación o un admin puedan descargar el adjunto
        if ($user->id !== $conversation->student_id && !$user->isAdmin() && !$user->isSuperAdmin()) {
            abort(403, 'No tienes permiso para descargar este archivo.');
        }

        if ($message->attachment_path && Storage::disk('public')->exists($message->attachment_path)) {
            return Storage::disk('public')->download($message->attachment_path);
        }

        abort(404, 'Archivo no encontrado.');
    }
}

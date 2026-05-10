<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Topic;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Mail\NewTicketNotification;
use App\Notifications\ConversationStatusUpdatedNotification;

class ConversationController extends Controller
{
    // Métodos para Estudiantes

    public function index(Request $request)
    {
        $query = Auth::user()->conversations()->with(['topic', 'assignedAdmin', 'tags']);

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $conversations = $query->latest('last_message_at')->paginate(10);
        return view('student.conversations.index', compact('conversations'));
    }

    public function create()
    {
        $topics = Topic::all();
        // Si no hay tópicos en la base de datos, añadir algunos de ejemplo.
        if ($topics->isEmpty()) {
            $topics = collect([
                (object)['id' => 0, 'name' => 'Consulta General'],
                (object)['id' => 1, 'name' => 'Soporte Técnico'],
                (object)['id' => 2, 'name' => 'Información de Cursos'],
            ]);
        }

        $tags = Tag::all();
        return view('student.conversations.create', compact('topics', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'topic_id' => 'required|exists:topics,id',
            'message_body' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'attachment' => 'nullable|file|max:2048', // Max 2MB
        ]);

        $conversation = new Conversation([
            'subject' => $request->subject,
            'student_id' => Auth::id(),
            'topic_id' => $request->topic_id,
            'status' => 'Abierto', // Estado inicial
            'priority' => 'Baja', // Prioridad inicial, puede ser cambiada por el admin
            'last_message_at' => now(),
        ]);
        $conversation->save();

        if ($request->has('tags')) {
            $conversation->tags()->attach($request->tags);
        }

        $message = new \App\Models\Message([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'message_body' => $request->message_body,
        ]);

        if ($request->hasFile('attachment')) {
            $message->attachment_path = $request->file('attachment')->store('attachments', 'public');
        }

        $message->save();

        // Enviar notificación al administrador
        $admins = User::whereIn('role', [User::ROLE_ADMIN, User::ROLE_SUPERADMIN])->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewTicketNotification($conversation));
        }

        return redirect()->route('student.conversations.show', $conversation)->with('success', 'Conversación iniciada correctamente.');
    }

    public function show(Conversation $conversation)
    {
        if ($conversation->student_id !== Auth::id() && !Auth::user()->hasRole('admin') && !Auth::user()->hasRole('superadmin')) {
            abort(403, 'No tienes permiso para ver esta conversación.');
        }

        $conversation->load(['messages.user', 'topic', 'assignedAdmin', 'tags']);
        return view('student.conversations.show', compact('conversation'));
    }

    // Métodos para Administradores

    public function adminIndex(Request $request)
    {
        $query = Conversation::with(['topic', 'student', 'assignedAdmin', 'tags']);

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $conversations = $query->latest('last_message_at')->paginate(10);
        return view('admin.conversations.index', compact('conversations'));
    }

    public function adminShow(Conversation $conversation)
    {
        $conversation->load(['messages.user', 'topic', 'student', 'assignedAdmin', 'tags']);
        $admins = User::whereIn('role', [User::ROLE_ADMIN, User::ROLE_SUPERADMIN])->get();
        $topics = Topic::all(); // En caso de querer reasignar topic (opcional)
        $tags = Tag::all(); // En caso de querer reasignar tags (opcional)

        return view('admin.conversations.show', compact('conversation', 'admins', 'topics', 'tags'));
    }

    public function updateStatus(Request $request, Conversation $conversation)
    {
        $request->validate([
            'status' => 'required|in:Abierto,Pendiente de respuesta del Estudiante,Pendiente de respuesta del Administrador,Resuelto,Cerrado',
        ]);

        $conversation->status = $request->status;
        if ($request->status === 'Cerrado') {
            $conversation->closed_at = now();
        } else {
            $conversation->closed_at = null;
        }
        $conversation->save();

        // Enviar notificación al estudiante sobre el cambio de estado
        $conversation->student->notify(new ConversationStatusUpdatedNotification($conversation));

        return back()->with('success', 'Estado de la conversación actualizado.');
    }

    public function assignAdmin(Request $request, Conversation $conversation)
    {
        $request->validate([
            'assigned_admin_id' => 'nullable|exists:users,id',
        ]);

        $oldAssignedAdminId = $conversation->assigned_admin_id;
        $conversation->assigned_admin_id = $request->assigned_admin_id;
        $conversation->save();

        // Enviar notificación al estudiante si cambia la asignación
        $conversation->student->notify(new ConversationStatusUpdatedNotification($conversation));

        // Notificar al nuevo admin asignado (si lo hay y es diferente al anterior)
        if ($conversation->assignedAdmin && $conversation->assignedAdmin->id !== $oldAssignedAdminId) {
            $conversation->assignedAdmin->notify(new ConversationStatusUpdatedNotification($conversation));
        }

        return back()->with('success', 'Administrador asignado correctamente.');
    }
}

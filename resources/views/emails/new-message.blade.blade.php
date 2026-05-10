@component('mail::message')
# Nuevo Mensaje en la Conversación

Has recibido un nuevo mensaje en la conversación "{{ $conversation->subject }}" de **{{ $message->user->name }}**.

**Mensaje:**
> {!! nl2br(e($message->message_body)) !!}

@if($message->attachment_path)
Adjunto: [Descargar archivo]({{ Storage::url($message->attachment_path) }})
@endif

@component('mail::button', ['url' => Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin') ? route('admin.conversations.show', $conversation) : route('student.conversations.show', $conversation)])
Ver Conversación
@endcomponent

Gracias,
{{ config('app.name') }}
@endcomponent 
@component('mail::message')
# Nuevo Ticket de Soporte Creado

Se ha creado un nuevo ticket de soporte.

**Asunto:** {{ $conversation->subject }}

**Estudiante:** {{ $conversation->student->name }}

**Tópico:** {{ $conversation->topic->name }}

@component('mail::button', ['url' => route('admin.conversations.show', $conversation)])
Ver Conversación
@endcomponent

Gracias,
{{ config('app.name') }}
@endcomponent 
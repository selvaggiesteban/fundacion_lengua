<div>
    {{-- In work, do what you enjoy. --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Conversación: {{ $conversation->subject }} (Estudiante: {{ $conversation->student->name }})</h5>
            <small class="text-muted">Tópico: {{ $conversation->topic->name }} | Prioridad: {{ $conversation->priority }}</small>
            @if($conversation->tags->isNotEmpty())
                <div>
                    @foreach($conversation->tags as $tag)
                        <span class="badge bg-label-primary">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
            <div class="mt-2">
                <label for="statusSelect" class="form-label">Estado:</label>
                <select wire:model.live="status" id="statusSelect" class="form-select d-inline-block w-auto">
                    <option value="Abierto">Abierto</option>
                    <option value="Pendiente de respuesta del Estudiante">Pendiente de respuesta del Estudiante</option>
                    <option value="Pendiente de respuesta del Administrador">Pendiente de respuesta del Administrador</option>
                    <option value="Resuelto">Resuelto</option>
                    <option value="Cerrado">Cerrado</option>
                </select>
                <label for="adminAssign" class="form-label ms-3">Asignar Administrador:</label>
                <select wire:model.live="assignedAdminId" id="adminAssign" class="form-select d-inline-block w-auto">
                    <option value="">No Asignado</option>
                    @foreach($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body chat-messages" style="max-height: 400px; overflow-y: auto;" x-data="{ init() { Livewire.on('messageSent', () => { this.$el.scrollTop = this.$el.scrollHeight; }); } }" x-init="init()">
            @forelse($messages as $message)
                <div class="d-flex {{ $message->user_id === Auth::id() ? 'justify-content-end' : 'justify-content-start' }} mb-2">
                    <div class="card {{ $message->user_id === Auth::id() ? 'bg-primary text-white' : 'bg-light' }}">
                        <div class="card-body p-2">
                            <small class="fw-bold">{{ $message->user->name }}:</small>
                            <p class="mb-1">{!! nl2br(e($message->message_body)) !!}</p>
                            @if($message->attachment_path)
                                <p class="mb-1">
                                    Adjunto: <a href="{{ route('messages.downloadAttachment', $message) }}" target="_blank" class="text-white"><i class="bx bx-file"></i> Descargar archivo</a>
                                </p>
                            @endif
                            <small class="text-muted d-block text-end {{ $message->user_id === Auth::id() ? 'text-white-50' : 'text-muted' }}">{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No hay mensajes en esta conversación.</p>
            @endforelse
        </div>
        <div class="card-footer">
            <form wire:submit.prevent="sendMessage" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" wire:model.live="newMessage" class="form-control" placeholder="Escribe tu mensaje...">
                    <input type="file" wire:model="attachment" class="form-control">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Enviar</button>
                </div>
                @error('newMessage') <span class="text-danger">{{ $message }}</span> @enderror
                @error('attachment') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
        </div>
    </div>
</div>

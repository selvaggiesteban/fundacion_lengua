<div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Mis Conversaciones</h5>
            <a href="{{ route('student.conversations.create') }}" class="btn btn-primary">{{ __('buttons.start_conversation') }}</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="{{ __('placeholders.search_conversations') }}">
                </div>
                <div class="col-md-6">
                    <select wire:model.live="statusFilter" class="form-select">
                        <option value="all">Todos los Estados</option>
                        <option value="Abierto">{{ __('status.open') }}</option>
                        <option value="Pendiente de respuesta del Estudiante">{{ __('status.pending_student') }}</option>
                        <option value="Pendiente de respuesta del Administrador">{{ __('status.pending_admin') }}</option>
                        <option value="Resuelto">{{ __('status.resolved') }}</option>
                        <option value="Cerrado">{{ __('status.closed') }}</option>
                    </select>
                </div>
            </div>

            @forelse($conversations as $conversation)
                <div class="list-group-item list-group-item-action mb-2 border p-3 rounded">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            <a href="{{ route('student.conversations.show', $conversation) }}">{{ $conversation->subject }}</a>
                        </h5>
                        <small class="text-muted">{{ $conversation->last_message_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-1">{{ __('labels.topic') }}: {{ $conversation->topic->name }}</p>
                    <small class="text-muted">{{ __('labels.status') }}: {{ $conversation->status }} | {{ __('labels.priority') }}: {{ $conversation->priority }}</small>
                    @if($conversation->tags->isNotEmpty())
                        <div>
                            @foreach($conversation->tags as $tag)
                                <span class="badge bg-label-primary">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-center">No tienes conversaciones disponibles.</p>
            @endforelse

            <div class="mt-3">
                {{ $conversations->links() }}
            </div>
        </div>
    </div>
</div>

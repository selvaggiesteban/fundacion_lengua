<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Conversación: {{ $conversation->subject }}</h5>
            <small class="text-muted">{{ __('labels.topic') }}: {{ $conversation->topic->name }} | {{ __('labels.status') }}: {{ $conversation->status }} | {{ __('labels.priority') }}: {{ $conversation->priority }}</small>
            @if($conversation->assignedAdmin)
                <small class="text-muted d-block">{{ __('labels.assigned_to') }}: {{ $conversation->assignedAdmin->name }}</small>
            @endif
            @if($conversation->tags->isNotEmpty())
                <div>
                    @foreach($conversation->tags as $tag)
                        <span class="badge bg-label-primary">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
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
                    <input type="text" wire:model.live="newMessage" class="form-control" placeholder="{{ __('placeholders.type_message') }}">
                    <input type="file" wire:model="attachment" class="form-control">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">{{ __('buttons.send') }}</button>
                </div>
                @error('newMessage') <span class="text-danger">{{ $message }}</span> @enderror
                @error('attachment') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
        </div>
    </div>
</div>

@extends('layouts/contentNavbarLayout')

@section('title', __('buttons.start_conversation'))

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mensajería /</span> {{ __('buttons.start_conversation') }}</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Nueva Conversación</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('student.conversations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="subject" class="form-label">{{ __('labels.subject') }}</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                    @error('subject')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="topic_id" class="form-label">{{ __('labels.topic') }}</label>
                    <select class="form-select" id="topic_id" name="topic_id" required>
                        <option value="">Selecciona un Tópico</option>
                        @foreach($topics as $topic)
                            <option value="{{ $topic->id }}" {{ old('topic_id') == $topic->id ? 'selected' : '' }}>{{ $topic->name }}</option>
                        @endforeach
                    </select>
                    @error('topic_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">{{ __('labels.tags') }} (Opcional)</label>
                    <select class="form-select" id="tags" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('tags.*')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="message_body" class="form-label">{{ __('labels.message') }}</label>
                    <textarea class="form-control" id="message_body" name="message_body" rows="5" required>{{ old('message_body') }}</textarea>
                    @error('message_body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="attachment" class="form-label">{{ __('labels.attachment') }} (Opcional)</label>
                    <input type="file" class="form-control" id="attachment" name="attachment">
                    @error('attachment')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('buttons.start_chat') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection 
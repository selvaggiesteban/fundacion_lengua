@extends('layouts/contentNavbarLayout')

@section('title', 'Conversación #' . $conversation->id)

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mensajería /</span> Conversación #{{ $conversation->id }}</h4>

    @livewire('student.conversation-chat', ['conversation' => $conversation])
</div>
@endsection 
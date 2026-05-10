@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Detalles del Test</h1>
        <div>
            <a href="{{ route('admin.tests.edit', $test) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('admin.tests.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>

    {{-- Tarjeta con los detalles principales del Test --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $test->title }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $test->description ?? 'No se proporcionó descripción.' }}</p>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Estado:</strong>
                        @if ($test->is_active)
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-secondary">Borrador</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-4">
                    <p><strong>Intentos Máximos:</strong> {{ $test->max_attempts == 0 ? 'Ilimitados' : $test->max_attempts }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Fecha de Creación:</strong> {{ $test->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tarjeta con las preguntas y respuestas --}}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Preguntas del Test ({{ $test->questions->count() }})</h5>
        </div>
        <div class="card-body">
            @if($test->questions->isEmpty())
                <p>Este test todavía no tiene preguntas.</p>
            @else
                <ol class="list-group list-group-numbered">
                    @foreach($test->questions as $question)
                        <li class="list-group-item d-flex flex-column">
                            <div class="fw-bold">{{ $question->question_text }}</div>
                            <ul class="list-unstyled mt-2 ms-3">
                                @foreach($question->answers as $answer)
                                    <li>
                                        {{ $answer->answer_text }}
                                        @if($answer->is_correct)
                                            <span class="badge rounded-pill bg-success ms-2">Correcta</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ol>
            @endif
        </div>
    </div>
</div>
@endsection
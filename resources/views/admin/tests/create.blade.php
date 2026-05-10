@extends('layouts/contentNavbarLayout')

@section('title', 'Crear test')

@section('content')
<div class="container">
    <h1>Crear Nuevo Test</h1>

    {{-- Mostramos errores de validación si los hay --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tests.store') }}" method="POST">
        @csrf
        <div class="card mb-4">
            <div class="card-header">
                <h4>Detalles del Test</h4>
            </div>
            <div class="card-body">
                {{-- Título del Test --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Título del Test</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                {{-- Descripción --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción (Opcional)</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="row">
                    {{-- Intentos Máximos --}}
                    <div class="col-md-6 mb-3">
                        <label for="max_attempts" class="form-label">Intentos Máximos (0 para ilimitados)</label>
                        <input type="number" class="form-control" id="max_attempts" name="max_attempts" value="{{ old('max_attempts', 1) }}" min="0" required>
                    </div>

                    {{-- Estado (Activo/Borrador) --}}
                    <div class="col-md-6 mb-3">
                        <div class="form-check form-switch mt-4">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Activar Test al guardar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Preguntas y Respuestas</h4>
            </div>
            <div class="card-body">
                <div id="questions-container">
                    {{-- Las preguntas se añadirán aquí dinámicamente --}}
                </div>
                <button type="button" id="add-question-btn" class="btn btn-secondary mt-2">Añadir Pregunta</button>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar Test</button>
            <a href="{{ route('admin.tests.index') }}" class="btn btn-link">Cancelar</a>
        </div>
    </form>
</div>

{{-- Plantilla para una nueva pregunta (estará oculta) --}}
<template id="question-template">
    <div class="question-block card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="question-title">Pregunta</h5>
                <button type="button" class="btn-close remove-question-btn" aria-label="Close"></button>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Texto de la Pregunta</label>
                <input type="text" class="form-control question-text" name="questions[INDEX][question_text]" required>
            </div>

            <h6>Respuestas</h6>
            <div class="answers-container">
                {{-- Las respuestas se añadirán aquí --}}
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm add-answer-btn">Añadir Respuesta</button>
        </div>
    </div>
</template>

{{-- Plantilla para una nueva respuesta (estará oculta) --}}
<template id="answer-template">
    <div class="answer-block input-group mb-2">
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="radio" name="questions[QUESTION_INDEX][correct_answer_index]" required>
        </div>
        <input type="text" class="form-control" name="questions[QUESTION_INDEX][answers][ANSWER_INDEX][answer_text]" placeholder="Texto de la respuesta" required>
        <button type="button" class="btn btn-outline-danger remove-answer-btn">Quitar</button>
    </div>
</template>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const questionsContainer = document.getElementById('questions-container');
    const addQuestionBtn = document.getElementById('add-question-btn');
    const questionTemplate = document.getElementById('question-template');
    const answerTemplate = document.getElementById('answer-template');
    let questionIndex = 0;

    addQuestionBtn.addEventListener('click', () => {
        addQuestion();
    });

    function addQuestion() {
        const newQuestion = questionTemplate.content.cloneNode(true);
        const questionBlock = newQuestion.querySelector('.question-block');
        
        // Asignar el índice a los nombres de los inputs
        questionBlock.innerHTML = questionBlock.innerHTML.replace(/\[INDEX\]/g, `[${questionIndex}]`);
        questionsContainer.appendChild(newQuestion);
        updateQuestionTitles();
        
        // Añadir 2 respuestas por defecto
        const newAnswersContainer = questionsContainer.querySelector(`div[data-question-index="${questionIndex}"] .answers-container`);
        addAnswer(questionsContainer.querySelector(`div[data-question-index="${questionIndex}"] .add-answer-btn`));
        addAnswer(questionsContainer.querySelector(`div[data-question-index="${questionIndex}"] .add-answer-btn`));
        
        questionIndex++;
    }

    function addAnswer(button) {
        const questionBlock = button.closest('.question-block');
        const answersContainer = questionBlock.querySelector('.answers-container');
        const currentQuestionIndex = parseInt(questionBlock.dataset.questionIndex, 10);
        
        if (answersContainer.children.length >= 4) {
            alert('No se pueden añadir más de 4 respuestas por pregunta.');
            return;
        }

        let answerIndex = answersContainer.children.length;

        const newAnswer = answerTemplate.content.cloneNode(true);
        const answerBlock = newAnswer.querySelector('.answer-block');
        
        // Asignar índices de pregunta y respuesta a los nombres de los inputs
        let html = answerBlock.innerHTML
            .replace(/\[QUESTION_INDEX\]/g, `[${currentQuestionIndex}]`)
            .replace(/\[ANSWER_INDEX\]/g, `[${answerIndex}]`);
        answerBlock.innerHTML = html;

        // Asignar el valor al radio button
        answerBlock.querySelector('input[type="radio"]').value = answerIndex;

        answersContainer.appendChild(newAnswer);
    }
    
    function updateQuestionTitles() {
        const allTitles = questionsContainer.querySelectorAll('.question-title');
        allTitles.forEach((title, index) => {
            title.textContent = `Pregunta ${index + 1}`;
            title.closest('.question-block').dataset.questionIndex = index;
        });
    }

    // Usar delegación de eventos para los botones de eliminar y añadir respuesta
    questionsContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-question-btn')) {
            e.target.closest('.question-block').remove();
            updateQuestionTitles();
        }

        if (e.target.classList.contains('add-answer-btn')) {
            addAnswer(e.target);
        }
        
        if (e.target.classList.contains('remove-answer-btn')) {
            e.target.closest('.answer-block').remove();
        }
    });

    // Añadir una pregunta por defecto al cargar la página
    addQuestion();
});
</script>
@endpush
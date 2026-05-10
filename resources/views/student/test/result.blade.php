@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{ $test->title }}</h1>
            <p class="mb-0">{{ $test->description }}</p>
        </div>
        <div class="card-body">
            <form action="{{ route('student.tests.store', $test) }}" method="POST">
                @csrf
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <p class="mb-0">{{ $errors->first() }}</p>
                    </div>
                @endif
                
                <ol class="list-group list-group-flush">
                    @foreach($test->questions as $question)
                        <li class="list-group-item py-4">
                            <p class="fw-bold fs-5">{{ $loop->iteration }}. {{ $question->question_text }}</p>
                            
                            <div class="ms-3">
                                {{-- Usamos ->shuffle() para que las respuestas no aparezcan siempre en el mismo orden --}}
                                @foreach($question->answers->shuffle() as $answer)
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="radio" 
                                               name="answers[{{ $question->id }}]" 
                                               id="answer-{{ $answer->id }}" 
                                               value="{{ $answer->id }}"
                                               required>
                                        <label class="form-check-label" for="answer-{{ $answer->id }}">
                                            {{ $answer->answer_text }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ol>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">{{ __('buttons.send_answers') }}</button>
                    <a href="{{ route('student.tests.index') }}" class="btn btn-link">{{ __('buttons.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Muestra la lista de tests disponibles para el estudiante.
     */
    public function index()
    {
        $studentId = Auth::id();

        // Obtenemos solo los tests activos y cargamos la relación 'attempts' 
        // pero solo para el estudiante actual para optimizar las consultas.
        $tests = Test::where('is_active', true)
                     ->withCount('questions')
                     ->with(['attempts' => function($query) use ($studentId) {
                         $query->where('student_id', $studentId);
                     }])
                     ->latest()
                     ->paginate(10);
        
        return view('student.tests.index', compact('tests'));
    }

    /**
     * Muestra el test para que el estudiante lo realice,
     * verificando primero si tiene intentos disponibles.
     */
    public function show(Test $test)
    {
        $studentId = Auth::id();

        // Verificación de Intentos
        $attemptsMade = $test->attempts()->where('student_id', $studentId)->count();
        $maxAttempts = $test->max_attempts;

        if ($maxAttempts != 0 && $attemptsMade >= $maxAttempts) {
            return redirect()->route('student.tests.index')
                             ->with('error', 'Ya has alcanzado el límite de intentos para este test.');
        }

        // Cargar las preguntas y sus respuestas para el formulario del test
        $test->load('questions.answers');

        return view('student.tests.show', compact('test'));
    }

    /**
     * Procesa las respuestas del estudiante, calcula el puntaje y lo guarda.
     */
    public function store(Request $request, Test $test)
    {
        $student = Auth::user();
        $totalQuestions = $test->questions()->count();

        // 1. Validación para asegurar que todas las preguntas fueron respondidas.
        $request->validate([
            'answers' => ['required', 'array', "size:{$totalQuestions}"],
            'answers.*' => ['required', 'integer', 'exists:answers,id'],
        ], [
            'answers.required' => 'Debes responder todas las preguntas.',
            'answers.size' => 'Debes responder todas las preguntas.',
        ]);

        // 2. Calcular el puntaje
        $correctAnswerIds = $test->questions()->with('correctAnswer')->get()->pluck('correctAnswer.id');
        $studentAnswers = collect(array_values($request->input('answers')));
        
        $score = $studentAnswers->intersect($correctAnswerIds)->count();

        // 3. Guardar el intento en la tabla pivote
        $student->attempts()->attach($test->id, [
            'score' => "{$score}/{$totalQuestions}",
            'submitted_at' => now()
        ]);

        // 4. Redirigir a la página de resultados
        return redirect()->route('student.tests.result', $test)
                         ->with('success', '¡Test completado! Revisa tus resultados.');
    }

    /**
     * Muestra la página de resultados de un test para el estudiante.
     */
    public function result(Test $test)
    {
        $studentId = Auth::id();

        // Obtener todos los intentos del estudiante para este test, del más reciente al más antiguo
        $attempts = $test->attempts()
                         ->where('student_id', $studentId)
                         ->latest('submitted_at')
                         ->get();
        
        // Si no hay intentos, redirigir al listado
        if ($attempts->isEmpty()) {
            return redirect()->route('student.tests.index');
        }

        return view('student.tests.result', compact('test', 'attempts'));
    }
}
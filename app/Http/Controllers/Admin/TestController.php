<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    /**
     * Muestra una lista de todos los tests.
     */
    public function index()
    {
        $tests = Test::withCount('questions')->latest()->paginate(15);
        
        return view('admin.tests.index', compact('tests'));
    }

    /**
     * Muestra el formulario para crear un nuevo test.
     */
    public function create()
    {
        return view('admin.tests.create');
    }

    /**
     * Guarda un nuevo test, con sus preguntas y respuestas, en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación (Idealmente, mover a un FormRequest para controladores más complejos)
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_attempts' => 'required|integer|min:0',
            'questions' => 'required|array|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.answers' => 'required|array|min:2|max:4',
            'questions.*.answers.*.answer_text' => 'required|string',
            'questions.*.correct_answer_index' => 'required|integer',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // 1. Crear el Test principal
                $test = Test::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'max_attempts' => $request->input('max_attempts'),
                    'is_active' => $request->has('is_active'), // Checkbox
                ]);

                // 2. Recorrer y crear cada Pregunta y sus Respuestas
                foreach ($request->input('questions') as $questionData) {
                    $question = $test->questions()->create([
                        'question_text' => $questionData['question_text'],
                    ]);

                    // Índice de la respuesta correcta para esta pregunta
                    $correctAnswerIndex = $questionData['correct_answer_index'];

                    foreach ($questionData['answers'] as $index => $answerData) {
                        $question->answers()->create([
                            'answer_text' => $answerData['answer_text'],
                            'is_correct' => ($index == $correctAnswerIndex),
                        ]);
                    }
                }
            });
        } catch (\Exception $e) {
            // Registrar el error para depuración
            Log::error('Error al crear el test: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al guardar el test. Por favor, inténtalo de nuevo.')->withInput();
        }

        return redirect()->route('admin.tests.index')->with('success', 'Test creado exitosamente.');
    }


    /**
     * Muestra un test específico con sus detalles.
     */
    public function show(Test $test)
    {
        // Cargar las relaciones para mostrarlas en la vista
        $test->load('questions.answers');
        return view('admin.tests.show', compact('test'));
    }

    /**
     * Muestra el formulario para editar un test existente.
     */
    public function edit(Test $test)
    {
        $test->load('questions.answers');
        return view('admin.tests.edit', compact('test'));
    }

    /**
     * Actualiza un test existente en la base de datos.
     */
    public function update(Request $request, Test $test)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_attempts' => 'required|integer|min:0',
            'questions' => 'required|array|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.answers' => 'required|array|min:2|max:4',
            'questions.*.answers.*.answer_text' => 'required|string',
            'questions.*.correct_answer_index' => 'required|integer',
        ]);
        
        try {
            DB::transaction(function () use ($request, $test) {
                // 1. Actualizar los datos del Test principal
                $test->update([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'max_attempts' => $request->input('max_attempts'),
                    'is_active' => $request->has('is_active'),
                ]);

                // 2. Eliminar las preguntas antiguas para reemplazarlas.
                // Gracias a onDelete('cascade'), esto también eliminará sus respuestas.
                $test->questions()->delete();

                // 3. Crear las nuevas preguntas y respuestas (misma lógica que en store)
                foreach ($request->input('questions') as $questionData) {
                    $question = $test->questions()->create([
                        'question_text' => $questionData['question_text'],
                    ]);
                    
                    $correctAnswerIndex = $questionData['correct_answer_index'];

                    foreach ($questionData['answers'] as $index => $answerData) {
                        $question->answers()->create([
                            'answer_text' => $answerData['answer_text'],
                            'is_correct' => ($index == $correctAnswerIndex),
                        ]);
                    }
                }
            });
        } catch (\Exception $e) {
            Log::error('Error al actualizar el test: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al actualizar el test.')->withInput();
        }

        return redirect()->route('admin.tests.index')->with('success', 'Test actualizado exitosamente.');
    }

    /**
     * Elimina un test de la base de datos.
     */
    public function destroy(Test $test)
    {
        try {
            // Gracias a onDelete('cascade'), al eliminar el test, se eliminarán
            // en cascada todas sus preguntas y respuestas asociadas.
            $test->delete();
        } catch (\Exception $e) {
            Log::error('Error al eliminar el test: ' . $e->getMessage());
            return redirect()->route('admin.tests.index')->with('error', 'No se pudo eliminar el test.');
        }

        return redirect()->route('admin.tests.index')->with('success', 'Test eliminado exitosamente.');
    }
}
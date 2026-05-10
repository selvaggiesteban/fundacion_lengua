<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GrantController extends Controller
{
    public function index()
    {
        $grants = Grant::latest()->paginate(15);
        
        return view('admin.grants.index', compact('grants'));
    }
    
    public function create()
    {
        return redirect()->route('admin.grants.index')->with('info', 'Las concesiones se crean desde el formulario público.');
    }
    
    public function store(Request $request)
    {
        
        $validSections = ['teachers', 'granted'];

        $validator = Validator::make($request->all(), [
            'section' => ['required', 'string', \Illuminate\Validation\Rule::in($validSections)],
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:255',
            'center' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput()->with('error_grant', 'Por favor corrige los errores en el formulario de concesión.');
        }

        Grant::create($request->all());

        return back()->with('success_grant', 'Tu solicitud de concesión ha sido enviada con éxito.');
    }
    
    public function show(Grant $grant)
    {

        return view('admin.grants.show', compact('grant'));
    }
    
    public function edit(Grant $grant)
    {
        return redirect()->route('admin.grants.show', $grant->id)->with('info', 'Las concesiones no se editan directamente.');
    }
    
    public function update(Request $request, Grant $grant)
    {
        return redirect()->route('admin.grants.show', $grant->id);
    }
    
    public function destroy(Grant $grant)
    {
        try {
            $grant->delete();
            return redirect()->route('admin.grants.index')->with('success', 'Concesión eliminada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('admin.grants.index')->with('error', 'Error al eliminar la concesión: ' . $e->getMessage());
        }
    }
}
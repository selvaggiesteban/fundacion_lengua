<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(15);
        
        return view('admin.inquiries.index', compact('inquiries'));
    }
    
    public function create()
    {
        return redirect()->route('admin.inquiries.index')->with('info', 'Las solicitudes se crean desde el formulario público.');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section' => ['required', 'string', 'in:teacher_teaching_inquiry,teacher_improvement_inquiry,student_inquiry'],
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:255',
            'center' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            
            return back()->withErrors($validator)->withInput()->with('error', 'Por favor corrige los errores en el formulario.');
        }

        Inquiry::create($request->all());
        
        return back()->with('success', 'Tu solicitud ha sido enviada con éxito. Nos pondremos en contacto contigo pronto.');
    }

    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }
    
    public function edit(Inquiry $inquiry)
    {
        return redirect()->route('admin.inquiries.show', $inquiry->id)->with('info', 'Las solicitudes de contacto no se editan.');
    }
    
    public function update(Request $request, Inquiry $inquiry)
    {
        return redirect()->route('admin.inquiries.show', $inquiry->id);
    }
    
    public function destroy(Inquiry $inquiry)
    {
        try {
            $inquiry->delete();
            return redirect()->route('admin.inquiries.index')->with('success', 'Solicitud eliminada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('admin.inquiries.index')->with('error', 'Error al eliminar la solicitud: ' . $e->getMessage());
        }
    }
}
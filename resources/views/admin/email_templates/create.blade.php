@extends('layouts/contentNavbarLayout')

@section('title', 'Crear Plantilla de Correo Electrónico')

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Plantillas de Correo Electrónico /</span> Crear Plantilla
</h4>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.email-templates.store') }}" method="POST">
            @include('admin.email_templates._form', [
                'emailTemplate' => $emailTemplate,
                'buttonText' => 'Crear Plantilla'
            ])
        </form>
    </div>
</div>
@endsection

@section('page-script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Verificar que Quill esté disponible
    if (typeof Quill === 'undefined') {
        console.error('Quill.js not loaded');
        return;
    }

    // Inicializar Quill para el textarea del cuerpo del email
    const textarea = document.getElementById('body');
    if (!textarea) {
        console.error('Textarea #body not found');
        return;
    }

    // Crear contenedor para Quill
    const quillContainer = document.createElement('div');
    quillContainer.id = 'quill-body-editor';
    quillContainer.style.cssText = `
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: white;
        min-height: 400px;
    `;

    // Insertar contenedor después del textarea y ocultar textarea
    textarea.style.display = 'none';
    textarea.parentNode.insertBefore(quillContainer, textarea.nextSibling);

    // Configuración de Quill con todas las características necesarias
    const quill = new Quill(quillContainer, {
        theme: 'snow',
        placeholder: 'Escriba el contenido del email aquí...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'align': [] }],
                ['link', 'image', 'code-block'],
                ['clean']
            ]
        }
    });

    // Cargar contenido inicial del textarea
    const initialContent = textarea.value || '';
    if (initialContent.trim()) {
        quill.clipboard.dangerouslyPasteHTML(initialContent);
    }

    // Sincronizar contenido con textarea
    quill.on('text-change', function() {
        textarea.value = quill.root.innerHTML;
    });

    // Asegurar sincronización antes del envío del formulario
    const form = textarea.closest('form');
    if (form) {
        form.addEventListener('submit', function() {
            textarea.value = quill.root.innerHTML;
        });
    }

    console.log('Quill.js initialized successfully for email template editor');
});
</script>
@endsection
@extends('layouts/contentNavbarLayout')

@section('title', 'Detalle de Solicitud Individual')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Detalle de Solicitud #{{ $inquiry->id }}</h5>
                <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-secondary">Volver al Listado</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>ID de Solicitud:</strong> {{ $inquiry->id }}</p>
                        <p><strong>Fecha de Envío:</strong> {{ $inquiry->created_at->format('d/m/Y H:i:s') }}</p>
                        <p><strong>Sección:</strong> {{ $inquiry->section_text }}</p> {{-- Usando el accesor del modelo --}}
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Nombre del Remitente:</strong> {{ $inquiry->name }}</p>
                        <p><strong>Email:</strong> <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></p>
                        <p><strong>Teléfono:</strong> {{ $inquiry->phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>País:</strong> {{ $inquiry->country }}</p>
                        <p><strong>Centro / Institución:</strong> {{ $inquiry->center }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-12">
                        <p><strong>Asunto:</strong></p>
                        <p>{{ $inquiry->subject }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-12">
                        <p><strong>Mensaje:</strong></p>
                        <div style="white-space: pre-wrap; background-color: #f8f9fa; border: 1px solid #dee2e6; padding: 10px; border-radius: 0.25rem;">{{ $inquiry->message }}</div>
                    </div>
                </div>

                <hr>

                <div class="mt-4">
                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" style="display:inline;" class="delete-inquiry-form" data-inquiry-subject="{{ $inquiry->subject }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="ri-delete-bin-line me-1"></i> Eliminar esta Solicitud
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script para confirmación de borrado (igual que en index.blade.php) --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('form.delete-inquiry-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const inquirySubject = this.dataset.inquirySubject;
            if (confirm(`¿Estás seguro de que quieres eliminar la solicitud con asunto: "${inquirySubject}"? Esta acción no se puede deshacer.`)) {
                this.submit();
            }
        });
    });
});
</script>
@endsection
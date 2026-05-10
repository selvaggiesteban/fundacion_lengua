@extends('layouts/contentNavbarLayout')

@section('title', 'Detalle de Concesión')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Detalle de Concesión #{{ $grant->id }}</h5>
                <a href="{{ route('admin.grants.index') }}" class="btn btn-sm btn-secondary">Volver al Listado</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>ID de Concesión:</strong> {{ $grant->id }}</p>
                        <p><strong>Fecha de Envío:</strong> {{ $grant->created_at->format('d/m/Y H:i:s') }}</p>
                        <p><strong>Sección:</strong> {{ $grant->section_text }}</p> {{-- Usando el accesor del modelo --}}
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Nombre del Remitente/Profesor:</strong> {{ $grant->name }}</p>
                        <p><strong>Email:</strong> <a href="mailto:{{ $grant->email }}">{{ $grant->email }}</a></p>
                        <p><strong>Teléfono:</strong> {{ $grant->phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>País:</strong> {{ $grant->country }}</p>
                        <p><strong>Centro / Institución:</strong> {{ $grant->center }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-12">
                        <p><strong>Asunto:</strong></p>
                        <p>{{ $grant->subject }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-12">
                        <p><strong>Mensaje/Detalles:</strong></p>
                        <div style="white-space: pre-wrap; background-color: #f8f9fa; border: 1px solid #dee2e6; padding: 10px; border-radius: 0.25rem;">{{ $grant->message }}</div>
                    </div>
                </div>

                <hr>

                <div class="mt-4">
                    <form action="{{ route('admin.grants.destroy', $grant->id) }}" method="POST" style="display:inline;" class="delete-grant-form" data-grant-subject="{{ $grant->subject }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="ri-delete-bin-line me-1"></i> Eliminar esta Concesión
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
    const deleteForms = document.querySelectorAll('form.delete-grant-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const grantSubject = this.dataset.grantSubject;
            if (confirm(`¿Estás seguro de que quieres eliminar la concesión con asunto: "${grantSubject}"? Esta acción no se puede deshacer.`)) {
                this.submit();
            }
        });
    });
});
</script>
@endsection
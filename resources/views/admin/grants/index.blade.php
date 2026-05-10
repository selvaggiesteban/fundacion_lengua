@extends('layouts/contentNavbarLayout')

@section('title', 'Listado de Concesiones')

@section('vendor-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection

@section('vendor-script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('page-script')
{{-- JavaScript functionality is now handled in app.js --}}
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Administración /</span> Concesiones
</h4>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Concesiones Recibidas</h5>
                {{-- No hay botón de "Crear Nueva" aquí, ya que se crean desde el frontend --}}
            </div>

            {{-- Mensajes de sesión para éxito o error --}}
            @if(session('success'))
                <div class="alert alert-success mx-4 mb-0">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger mx-4 mb-0">{{ session('error') }}</div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="datatables-grants table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Acciones</th>
                            <th>Sección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($grants as $grant)
                        <tr>
                            <td>{{ $grant->id }}</td>
                            <td>
                                <div class="d-flex me-3">
                                    <button class="btn btn-sm btn-danger text-white email-button" 
                                            data-student-id="{{ $grant->id }}" 
                                            data-identifier="CON" 
                                            title="Concesión de beca individual (CON)">CON</button>
                                    <button class="btn btn-sm" title="Imprimir registro"><i class="ri-printer-line"></i></button>
                                </div>
                            </td>
                            <td>{{ $grant->section_text }}</td> {{-- Usando el accesor del modelo Grant --}}
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.grants.show', $grant->id) }}" class="btn btn-sm btn-icon item-edit me-1" title="Ver Detalle">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <form action="{{ route('admin.grants.destroy', $grant->id) }}" method="POST" style="display:inline;" class="delete-grant-form" data-grant-subject="{{ $grant->subject }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon item-delete" title="Eliminar Concesión">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">No hay concesiones recibidas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Pre-cargar plantillas de email -->
<div id="emailTemplatesData" style="display: none;">
  <div class="email-template" data-identifier="CON" 
       data-subject="Concesión de beca individual (CON)" 
       data-body="<p>Estimado/a beneficiario/a,</p><p>Nos complace informarle que ha sido beneficiario/a de una concesión de beca individual.</p><p>Saludos cordiales.</p>"></div>
</div>

@include('shared.modals.send-email-modal')
@endsection
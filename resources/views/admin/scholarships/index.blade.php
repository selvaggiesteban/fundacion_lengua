@extends('layouts/contentNavbarLayout')

@section('title', 'Becas')

@section('vendor-style')
{{-- CSS files are already included in app.js --}}
@endsection

@section('vendor-script')
{{-- JS files are already included in app.js --}}
@endsection

@section('page-script')
{{-- JavaScript functionality is now handled in app.js --}}
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Administración /</span> Becas
</h4>

<!-- Becas List Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Gestión de Becas</h5>
    <a href="{{ route('admin.scholarships.create') }}" class="btn btn-primary">
      <i class="ri-add-line me-1"></i> Nueva Beca
    </a>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-scholarships table border-top">
      <thead>
        <tr>
          <th>ID</th>
          <th>Acciones</th>
          <th>Título</th>
          <th>Sección</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($scholarships as $scholarship)
        <tr>
          <td>{{ $scholarship->id }}</td>
          <td>
            <div class="d-flex me-3">
              <button class="btn btn-sm btn-danger text-white email-button" 
                      data-student-id="{{ $scholarship->id }}" 
                      data-identifier="CODI25" 
                      title="Enviar información del Programa de Becas/Scholarship 2025 (CODI)">CODI'25</button>
              <button class="btn btn-sm btn-danger text-white email-button" 
                      data-student-id="{{ $scholarship->id }}" 
                      data-identifier="CONC25" 
                      title="Enviar confirmación de interés en el Programa de Becas/Scholarship 2025 (CONC)">CONC'25</button>
              <button class="btn btn-sm" title="Imprimir registro"><i class="ri-printer-line"></i></button>
            </div>
          </td>
          <td>{{ $scholarship->title }}</td>
          <td>
            @switch($scholarship->section)
              @case('university')
                Universidad
                @break
              @case('language')
                Idiomas
                @break
              @case('cultural')
                Cultural
                @break
              @default
                {{ $scholarship->section }}
            @endswitch
          </td>
          <td>
            <div class="d-inline-block">
              <a href="{{ route('admin.scholarships.show', $scholarship->id) }}" class="btn btn-sm btn-icon">
                <i class="ri-eye-line"></i>
              </a>
              <a href="{{ route('admin.scholarships.edit', $scholarship->id) }}" class="btn btn-sm btn-icon">
                <i class="ri-pencil-line"></i>
              </a>
              <form action="{{ route('admin.scholarships.destroy', $scholarship->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-sm btn-icon delete-record" data-id="{{ $scholarship->id }}">
                  <i class="ri-delete-bin-line"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Pre-cargar plantillas de email -->
<div id="emailTemplatesData" style="display: none;">
  <div class="email-template" data-identifier="CODI25" 
       data-subject="Información del Programa de Becas/Scholarship 2025 (CODI)" 
       data-body="<p>Estimado/a solicitante,</p><p>Le enviamos información sobre el Programa de Becas/Scholarship 2025 (CODI).</p><p>Saludos cordiales.</p>"></div>
  <div class="email-template" data-identifier="CONC25" 
       data-subject="Confirmación de interés en el Programa de Becas/Scholarship 2025 (CONC)" 
       data-body="<p>Estimado/a solicitante,</p><p>Confirmamos su interés en el Programa de Becas/Scholarship 2025 (CONC).</p><p>Saludos cordiales.</p>"></div>
</div>

@include('shared.modals.send-email-modal')
@endsection 
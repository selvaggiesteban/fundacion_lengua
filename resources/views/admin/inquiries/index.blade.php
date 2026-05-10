@extends('layouts/contentNavbarLayout')

@section('title', 'Listado de Solicitudes Individuales')

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
  <span class="text-muted fw-light">Administración /</span> Solicitudes
</h4>

<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Solicitudes Recibidas</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-inquiries table border-top">
      <thead>
        <tr>
          <th>ID</th>
          <th>Acciones</th>
          <th>Sección</th>
          <th>Nombre Remitente</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($inquiries as $inquiry)
        <tr>
          <td>{{ $inquiry->id }}</td>
          <td>
            <div class="d-flex me-3">
              <button class="btn btn-sm btn-danger text-white email-button" 
                      data-student-id="{{ $inquiry->id }}" 
                      data-identifier="COD" 
                      title="Enviar información del Programa de Becas/Scholarship 2025 (COD + INS 25)">COD + INS 25</button>
              <button class="btn btn-sm btn-danger text-white email-button" 
                      data-student-id="{{ $inquiry->id }}" 
                      data-identifier="CON" 
                      title="Enviar concesión individual del Programa de Becas/Scholarship 2025 (CON & IND 25)">CON & IND 25</button>
            </div>
          </td>
          <td>{{ $inquiry->section_text }}</td>
          <td>{{ $inquiry->name }}</td>
          <td>
            <div class="d-inline-block">
              <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-sm btn-icon">
                <i class="ri-eye-line"></i>
              </a>
              <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" style="display:inline;" data-inquiry-subject="{{ $inquiry->subject }}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-sm btn-icon delete-record" data-id="{{ $inquiry->id }}">
                  <i class="ri-delete-bin-line"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center py-3">No hay solicitudes recibidas.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<!-- Pre-cargar plantillas de email -->
<div id="emailTemplatesData" style="display: none;">
  <div class="email-template" data-identifier="COD" 
       data-subject="Información del Programa de Becas/Scholarship 2025 (COD + INS 25)" 
       data-body="<p>Estimado/a solicitante,</p><p>Le enviamos información sobre el Programa de Becas/Scholarship 2025 (COD + INS 25).</p><p>Saludos cordiales.</p>"></div>
  <div class="email-template" data-identifier="CON" 
       data-subject="Concesión individual del Programa de Becas/Scholarship 2025 (CON & IND 25)" 
       data-body="<p>Estimado/a solicitante,</p><p>Nos complace informarle sobre la concesión individual del Programa de Becas/Scholarship 2025 (CON & IND 25).</p><p>Saludos cordiales.</p>"></div>
</div>

@include('shared.modals.send-email-modal')
@endsection
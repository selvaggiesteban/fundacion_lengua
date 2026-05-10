@extends('layouts/contentNavbarLayout')

@section('title', 'Detalles de la Beca')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detalles de la Beca: {{ $scholarship->title }}</h5>
        <div>
          <a href="{{ route('admin.scholarships.edit', $scholarship->id) }}" class="btn btn-primary me-2">
            <i class="ri-pencil-line me-1"></i> Editar
          </a>
          <a href="{{ route('admin.scholarships.index') }}" class="btn btn-secondary">
            <i class="ri-arrow-left-line me-1"></i> Volver al Listado
          </a>
        </div>
      </div>
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
          <div class="col-12">
            <h6 class="fw-bold">Información General</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Título</label>
            <div>{{ $scholarship->title }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Sección</label>
            <div>{{ $scholarship->section_text }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Código de Descuento</label>
            <div>{{ $scholarship->discount_code ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Porcentaje de Descuento</label>
            <div>{{ $scholarship->discount_percentage ?? 0 }}%</div>
          </div>

          <div class="col-12 mb-3">
            <label class="form-label fw-bold">Descripción</label>
            <div>{!! $scholarship->description !!}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Fecha de Inicio</label>
            <div>{{ $scholarship->start_date ? $scholarship->start_date->format('d/m/Y') : 'No especificada' }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Fecha de Fin</label>
            <div>{{ $scholarship->end_date ? $scholarship->end_date->format('d/m/Y') : 'No especificada' }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Estado</label>
            <div>
              @if($scholarship->status === 'active')
                <span class="badge bg-success">Activa</span>
              @else
                <span class="badge bg-danger">Inactiva</span>
              @endif
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Plazas Disponibles</label>
            <div>{{ $scholarship->available_slots ?? 'Ilimitadas' }}</div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Estudiantes Asociados</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12 mb-3">
            <div>
              @if($scholarship->students && $scholarship->students->count() > 0)
                <div class="table-responsive">
                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha de Inicio</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($scholarship->students as $student)
                        <tr>
                          <td>{{ $student->id }}</td>
                          <td>{{ $student->name }}</td>
                          <td>{{ $student->email }}</td>
                          <td>{{ $student->start_date ? $student->start_date->format('d/m/Y') : 'N/A' }}</td>
                          <td>
                            <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-info">
                              <i class="ri-eye-line"></i>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @else
                <p>No hay estudiantes asociados a esta beca.</p>
              @endif
            </div>
          </div>

          <div class="col-12 mt-4">
            <a href="{{ route('admin.scholarships.edit', $scholarship->id) }}" class="btn btn-primary me-2">
              <i class="ri-pencil-line me-1"></i> Editar
            </a>
            <a href="{{ route('admin.scholarships.index') }}" class="btn btn-secondary">
              <i class="ri-arrow-left-line me-1"></i> Volver al Listado
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
@extends('layouts/contentNavbarLayout')

@section('title', 'Crear Nueva Beca')

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
        <h5 class="mb-0">Crear Nueva Beca</h5>
        <a href="{{ route('admin.scholarships.index') }}" class="btn btn-secondary">
          <i class="ri-arrow-left-line me-1"></i> Volver al Listado
        </a>
      </div>
      <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('admin.scholarships.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
          @csrf
          
          <div class="col-12">
            <h6 class="fw-bold">Información General</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6">
            <label for="title" class="form-label">Título de la Beca <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="section" class="form-label">Sección <span class="text-danger">*</span></label>
            <select id="section" name="section" class="form-select @error('section') is-invalid @enderror" required>
              <option value="" disabled {{ old('section') ? '' : 'selected' }}>Selecciona una sección</option>
              <option value="centers" {{ old('section') == 'centers' ? 'selected' : '' }}>Centros</option>
              <option value="firenza" {{ old('section') == 'firenza' ? 'selected' : '' }}>Firenza</option>
              <option value="private" {{ old('section') == 'private' ? 'selected' : '' }}>Particulares</option>
              <option value="general" {{ old('section') == 'general' ? 'selected' : '' }}>Generales</option>
            </select>
            @error('section')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-12">
            <label for="summary" class="form-label">Resumen <span class="text-danger">*</span></label>
            <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary" rows="4" required>{{ old('summary') }}</textarea>
            @error('summary')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            <div class="form-text">Formatos aceptados: JPG, PNG, GIF. Tamaño máximo: 2MB.</div>
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="discount_code" class="form-label">Código de Descuento</label>
            <input type="text" class="form-control @error('discount_code') is-invalid @enderror" id="discount_code" name="discount_code" value="{{ old('discount_code') }}">
            @error('discount_code')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Fechas de Aplicación</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6">
            <label for="application_start_date" class="form-label">Fecha de Inicio <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('application_start_date') is-invalid @enderror" id="application_start_date" name="application_start_date" value="{{ old('application_start_date') }}" required>
            @error('application_start_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="application_end_date" class="form-label">Fecha de Fin <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('application_end_date') is-invalid @enderror" id="application_end_date" name="application_end_date" value="{{ old('application_end_date') }}" required>
            @error('application_end_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información de Contacto</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4">
            <label for="contact_name" class="form-label">Nombre de Contacto <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('contact_name') is-invalid @enderror" id="contact_name" name="contact_name" value="{{ old('contact_name') }}" required>
            @error('contact_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="contact_phone" class="form-label">Teléfono de Contacto <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" required>
            @error('contact_phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="contact_email" class="form-label">Email de Contacto <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" value="{{ old('contact_email') }}" required>
            @error('contact_email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Descuentos</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Semana</th>
                    <th>Descuento (%)</th>
                    <th>Semana</th>
                    <th>Descuento (%)</th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i = 1; $i <= 12; $i++)
                  @if($i % 2 != 0)
                  <tr>
                    <td>Semana {{ $i }}</td>
                    <td>
                      <input type="number" min="0" max="100" class="form-control form-control-sm" name="discounts[odd][{{ $i }}]" value="{{ old('discounts.odd.' . $i) }}">
                    </td>
                    @if($i + 1 <= 12)
                    <td>Semana {{ $i + 1 }}</td>
                    <td>
                      <input type="number" min="0" max="100" class="form-control form-control-sm" name="discounts[even][{{ $i + 1 }}]" value="{{ old('discounts.even.' . ($i + 1)) }}">
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    @endif
                  </tr>
                  @endif
                  @endfor
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información Adicional</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12">
            <label for="foundation_notes" class="form-label">Notas Internas</label>
            <textarea class="form-control @error('foundation_notes') is-invalid @enderror" id="foundation_notes" name="foundation_notes" rows="3">{{ old('foundation_notes') }}</textarea>
            @error('foundation_notes')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-12">
            <label for="tags_input" class="form-label">Etiquetas</label>
            <input type="text" class="form-control @error('tags_input') is-invalid @enderror" id="tags_input" name="tags_input" value="{{ old('tags_input') }}" placeholder="Etiqueta1, Etiqueta2, Etiqueta3">
            <div class="form-text">Separa las etiquetas con comas.</div>
            @error('tags_input')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary me-2">
              <i class="ri-save-line me-1"></i> Guardar Beca
            </button>
            <a href="{{ route('admin.scholarships.index') }}" class="btn btn-secondary">
              <i class="ri-close-line me-1"></i> Cancelar
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection 
@extends('layouts/contentNavbarLayout')

@section('title', 'Crear Nuevo Alojamiento')

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
        <h5 class="mb-0">Crear Nuevo Alojamiento</h5>
        <a href="{{ route('admin.accomodations.index') }}" class="btn btn-secondary">
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

        <form action="{{ route('admin.accomodations.store') }}" method="POST" class="row g-3">
          @csrf
          
          <div class="col-12">
            <h6 class="fw-bold">Información General</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6">
            <label for="section" class="form-label">Sección <span class="text-danger">*</span></label>
            <select id="section" name="section" class="form-select @error('section') is-invalid @enderror" required>
              <option value="" disabled {{ old('section') ? '' : 'selected' }}>Selecciona una sección</option>
              <option value="family_stay" {{ old('section') == 'family_stay' ? 'selected' : '' }}>Alojamiento en familia</option>
              <option value="university_residence" {{ old('section') == 'university_residence' ? 'selected' : '' }}>Residencia Universitaria</option>
              <option value="hotel" {{ old('section') == 'hotel' ? 'selected' : '' }}>Hotel</option>
              <option value="apartment" {{ old('section') == 'apartment' ? 'selected' : '' }}>Apartamento</option>
            </select>
            @error('section')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="name" class="form-label">Nombre del Alojamiento <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="tax_id" class="form-label">CIF/NIF <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('tax_id') is-invalid @enderror" id="tax_id" name="tax_id" value="{{ old('tax_id') }}" required>
            @error('tax_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Dirección</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12">
            <label for="address" class="form-label">Dirección <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="postal_code" class="form-label">Código Postal <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
            @error('postal_code')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="city" class="form-label">Ciudad <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" required>
            @error('city')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="province" class="form-label">Provincia <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province') }}" required>
            @error('province')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="country" class="form-label">País <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', 'España') }}" required>
            @error('country')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información de Contacto</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4">
            <label for="phone_1" class="form-label">Teléfono Principal <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('phone_1') is-invalid @enderror" id="phone_1" name="phone_1" value="{{ old('phone_1') }}" required>
            @error('phone_1')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="phone_2" class="form-label">Teléfono Secundario</label>
            <input type="text" class="form-control @error('phone_2') is-invalid @enderror" id="phone_2" name="phone_2" value="{{ old('phone_2') }}">
            @error('phone_2')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="fax" class="form-label">Fax</label>
            <input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" name="fax" value="{{ old('fax') }}">
            @error('fax')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="website" class="form-label">Sitio Web</label>
            <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="https://">
            @error('website')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Contacto Principal</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4">
            <label for="contact1_name" class="form-label">Nombre <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('contact1_name') is-invalid @enderror" id="contact1_name" name="contact1_name" value="{{ old('contact1_name') }}" required>
            @error('contact1_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="contact1_position" class="form-label">Cargo <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('contact1_position') is-invalid @enderror" id="contact1_position" name="contact1_position" value="{{ old('contact1_position') }}" required>
            @error('contact1_position')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="contact1_email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('contact1_email') is-invalid @enderror" id="contact1_email" name="contact1_email" value="{{ old('contact1_email') }}" required>
            @error('contact1_email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Contacto Secundario (Opcional)</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4">
            <label for="contact2_name" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('contact2_name') is-invalid @enderror" id="contact2_name" name="contact2_name" value="{{ old('contact2_name') }}">
            @error('contact2_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="contact2_position" class="form-label">Cargo</label>
            <input type="text" class="form-control @error('contact2_position') is-invalid @enderror" id="contact2_position" name="contact2_position" value="{{ old('contact2_position') }}">
            @error('contact2_position')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="contact2_email" class="form-label">Email</label>
            <input type="email" class="form-control @error('contact2_email') is-invalid @enderror" id="contact2_email" name="contact2_email" value="{{ old('contact2_email') }}">
            @error('contact2_email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información Adicional</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6">
            <label for="extra_info_1" class="form-label">Información Extra 1</label>
            <textarea class="form-control @error('extra_info_1') is-invalid @enderror" id="extra_info_1" name="extra_info_1" rows="3">{{ old('extra_info_1') }}</textarea>
            @error('extra_info_1')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="extra_info_2" class="form-label">Información Extra 2</label>
            <textarea class="form-control @error('extra_info_2') is-invalid @enderror" id="extra_info_2" name="extra_info_2" rows="3">{{ old('extra_info_2') }}</textarea>
            @error('extra_info_2')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="other_data" class="form-label">Otros Datos</label>
            <textarea class="form-control @error('other_data') is-invalid @enderror" id="other_data" name="other_data" rows="3">{{ old('other_data') }}</textarea>
            @error('other_data')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="observations" class="form-label">Observaciones</label>
            <textarea class="form-control @error('observations') is-invalid @enderror" id="observations" name="observations" rows="3">{{ old('observations') }}</textarea>
            @error('observations')
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
              <i class="ri-save-line me-1"></i> Guardar Alojamiento
            </button>
            <a href="{{ route('admin.accomodations.index') }}" class="btn btn-secondary">
              <i class="ri-close-line me-1"></i> Cancelar
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection 
@extends('layouts/contentNavbarLayout')

@section('title', 'Crear Nuevo Estudiante')

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
        <h5 class="mb-0">Crear Nuevo Estudiante</h5>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
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

        <form action="{{ route('admin.students.store') }}" method="POST" class="row g-3">
          @csrf
          
          <div class="col-12">
            <h6 class="fw-bold">Información General</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6">
            <label for="name" class="form-label">Nombre Completo <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="passport" class="form-label">Pasaporte/DNI <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('passport') is-invalid @enderror" id="passport" name="passport" value="{{ old('passport') }}" required>
            @error('passport')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="birthdate" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
            @error('birthdate')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="sex" class="form-label">Género <span class="text-danger">*</span></label>
            <select id="sex" name="sex" class="form-select @error('sex') is-invalid @enderror" required>
              <option value="" disabled {{ old('sex') ? '' : 'selected' }}>Selecciona una opción</option>
              <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>Masculino</option>
              <option value="F" {{ old('sex') == 'F' ? 'selected' : '' }}>Femenino</option>
              <option value="O" {{ old('sex') == 'O' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('sex')
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

          <div class="col-md-4">
            <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información Académica</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4">
            <label for="language" class="form-label">Idioma Principal <span class="text-danger">*</span></label>
            <select id="language" name="language" class="form-select @error('language') is-invalid @enderror" required>
              <option value="" disabled {{ old('language') ? '' : 'selected' }}>Selecciona un idioma</option>
              <option value="spanish" {{ old('language') == 'spanish' ? 'selected' : '' }}>Español</option>
              <option value="english" {{ old('language') == 'english' ? 'selected' : '' }}>Inglés</option>
              <option value="french" {{ old('language') == 'french' ? 'selected' : '' }}>Francés</option>
              <option value="german" {{ old('language') == 'german' ? 'selected' : '' }}>Alemán</option>
              <option value="italian" {{ old('language') == 'italian' ? 'selected' : '' }}>Italiano</option>
              <option value="other" {{ old('language') == 'other' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('language')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="second_language" class="form-label">Segundo Idioma</label>
            <select id="second_language" name="second_language" class="form-select @error('second_language') is-invalid @enderror">
              <option value="" {{ old('second_language') ? '' : 'selected' }}>Ninguno</option>
              <option value="spanish" {{ old('second_language') == 'spanish' ? 'selected' : '' }}>Español</option>
              <option value="english" {{ old('second_language') == 'english' ? 'selected' : '' }}>Inglés</option>
              <option value="french" {{ old('second_language') == 'french' ? 'selected' : '' }}>Francés</option>
              <option value="german" {{ old('second_language') == 'german' ? 'selected' : '' }}>Alemán</option>
              <option value="italian" {{ old('second_language') == 'italian' ? 'selected' : '' }}>Italiano</option>
              <option value="other" {{ old('second_language') == 'other' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('second_language')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="level" class="form-label">Nivel <span class="text-danger">*</span></label>
            <select id="level" name="level" class="form-select @error('level') is-invalid @enderror" required>
              <option value="" disabled {{ old('level') ? '' : 'selected' }}>Selecciona un nivel</option>
              <option value="A1" {{ old('level') == 'A1' ? 'selected' : '' }}>A1 - Principiante</option>
              <option value="A2" {{ old('level') == 'A2' ? 'selected' : '' }}>A2 - Elemental</option>
              <option value="B1" {{ old('level') == 'B1' ? 'selected' : '' }}>B1 - Intermedio</option>
              <option value="B2" {{ old('level') == 'B2' ? 'selected' : '' }}>B2 - Intermedio Alto</option>
              <option value="C1" {{ old('level') == 'C1' ? 'selected' : '' }}>C1 - Avanzado</option>
              <option value="C2" {{ old('level') == 'C2' ? 'selected' : '' }}>C2 - Dominio</option>
            </select>
            @error('level')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="center" class="form-label">Centro <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('center') is-invalid @enderror" id="center" name="center" value="{{ old('center') }}" required>
            @error('center')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="partner" class="form-label">Socio/Referencia</label>
            <input type="text" class="form-control @error('partner') is-invalid @enderror" id="partner" name="partner" value="{{ old('partner') }}">
            @error('partner')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Estado y Fechas</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4">
            <div class="form-check form-switch mt-4">
              <input class="form-check-input" type="checkbox" id="status" name="status" {{ old('status') ? 'checked' : '' }}>
              <label class="form-check-label" for="status">Estudiante Activo</label>
            </div>
          </div>

          <div class="col-md-4">
            <label for="payment_status" class="form-label">Estado de Pago</label>
            <select id="payment_status" name="payment_status" class="form-select @error('payment_status') is-invalid @enderror">
              <option value="" {{ old('payment_status') ? '' : 'selected' }}>No especificado</option>
              <option value="507" {{ old('payment_status') == '507' ? 'selected' : '' }}>Renuncia / Aplazamiento</option>
              <option value="503" {{ old('payment_status') == '503' ? 'selected' : '' }}>Pago en efectivo</option>
              <option value="501" {{ old('payment_status') == '501' ? 'selected' : '' }}>Pago por transferencia</option>
              <option value="500" {{ old('payment_status') == '500' ? 'selected' : '' }}>Curso finalizado</option>
              <option value="499" {{ old('payment_status') == '499' ? 'selected' : '' }}>Pago con tarjeta</option>
              <option value="485" {{ old('payment_status') == '485' ? 'selected' : '' }}>Revisión</option>
              <option value="505" {{ old('payment_status') == '505' ? 'selected' : '' }}>Pendiente</option>
            </select>
            @error('payment_status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="user_level" class="form-label">Nivel de Usuario</label>
            <select id="user_level" name="user_level" class="form-select @error('user_level') is-invalid @enderror">
              <option value="" {{ old('user_level') ? '' : 'selected' }}>Estándar</option>
              <option value="premium" {{ old('user_level') == 'premium' ? 'selected' : '' }}>Premium</option>
              <option value="vip" {{ old('user_level') == 'vip' ? 'selected' : '' }}>VIP</option>
            </select>
            @error('user_level')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="start_date" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
            @error('start_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="end_date" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
            @error('end_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary me-2">
              <i class="ri-save-line me-1"></i> Guardar Estudiante
            </button>
            <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
              <i class="ri-close-line me-1"></i> Cancelar
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection 
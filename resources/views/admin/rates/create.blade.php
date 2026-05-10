@extends('layouts/contentNavbarLayout')

@section('title', 'Nueva Tarifa')

@section('vendor-style')
    {{-- Puedes añadir estilos específicos si los necesitas --}}
@endsection

@section('vendor-script')
    {{-- Puedes añadir scripts específicos si los necesitas --}}
@endsection

@section('page-script')
    {{-- Puedes añadir scripts específicos de la página si los necesitas --}}
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Crear Nueva Tarifa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.rates.store') }}" method="POST">
                @csrf

                {{-- Mostrar errores de validación si existen --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <p><strong>¡Ups! Hubo algunos problemas con tu envío:</strong></p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Mensaje de éxito de la sesión --}}
                @if(session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="section" class="form-label">Sección <span class="text-danger">*</span></label>
                            <select name="section" id="section" class="form-control @error('section') is-invalid @enderror" required>
                                <option value="">Seleccione una sección...</option>
                                <option value="course_type" {{ old('section') == 'course_type' ? 'selected' : '' }}>Tipo de curso</option>
                                <option value="accommodation_fee" {{ old('section') == 'accommodation_fee' ? 'selected' : '' }}>Alojamiento</option>
                                <option value="options" {{ old('section') == 'options' ? 'selected' : '' }}>Opcionales</option>
                                <option value="registration" {{ old('section') == 'registration' ? 'selected' : '' }}>Inscripción</option>
                                <option value="discount_definition" {{ old('section') == 'discount_definition' ? 'selected' : '' }}>Descuento</option>
                                <option value="date_period" {{ old('section') == 'date_period' ? 'selected' : '' }}>Fechas</option>
                            </select>
                            @error('section') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                         <div class="form-group mb-3">
                            <label for="start_date" class="form-label">Válido Desde <span class="text-danger">*</span></label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="end_date" class="form-label">Válido Hasta <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required>
                            @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="summary" class="form-label">Resumen / Descripción <span class="text-danger">*</span></label>
                            <textarea name="summary" id="summary" class="form-control @error('summary') is-invalid @enderror" rows="5" required>{{ old('summary') }}</textarea>
                            @error('summary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="tags_input" class="form-label">Etiquetas (separadas por coma) <span class="text-danger">*</span></label>
                            <input type="text" name="tags_input" id="tags_input" class="form-control @error('tags_input') is-invalid @enderror" value="{{ old('tags_input') }}" placeholder="ej: temporada alta, oferta especial" required>
                            @error('tags_input') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label>Tarifas Semanales (si aplica)</label>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Semana</th>
                                    <th class="text-center">Tarifa Año IMPAR (€)</th>
                                    <th class="text-center">Tarifa Año PAR (€)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 40; $i++) {{-- Extendido a 40 semanas para mayor flexibilidad --}}
                                <tr>
                                    <td class="text-center align-middle">{{ $i }} Semana(s)</td>
                                    <td>
                                        <input type="number" name="weekly_rates[odd][{{ $i }}]" class="form-control form-control-sm @error('weekly_rates.odd.'.$i) is-invalid @enderror" value="{{ old('weekly_rates.odd.'.$i) }}" min="0" step="0.01" placeholder="0.00">
                                        @error('weekly_rates.odd.'.$i) <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="weekly_rates[even][{{ $i }}]" class="form-control form-control-sm @error('weekly_rates.even.'.$i) is-invalid @enderror" value="{{ old('weekly_rates.even.'.$i) }}" min="0" step="0.01" placeholder="0.00">
                                        @error('weekly_rates.even.'.$i) <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    {{-- Error general para el array weekly_rates, si la validación falla a nivel de array --}}
                    @error('weekly_rates') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="form-group mt-4">
                    <a href="{{ route('admin.rates.index') }}" class="btn btn-secondary">Cancelar y Volver al Listado</a>
                    <button type="submit" class="btn btn-primary">Guardar Tarifa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts/contentNavbarLayout')

@section('title', 'Editar Tarifa')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Editando Tarifa: {{ $rate->title }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.rates.update', $rate->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Importante para la actualización --}}

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
                    {{-- Columna Izquierda --}}
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $rate->title) }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="section" class="form-label">Sección <span class="text-danger">*</span></label>
                            <select name="section" id="section" class="form-control @error('section') is-invalid @enderror" required>
                                <option value="">Seleccione una sección...</option>
                                <option value="course_type" {{ old('section', $rate->section) == 'course_type' ? 'selected' : '' }}>Tipo de curso</option>
                                <option value="accommodation_fee" {{ old('section', $rate->section) == 'accommodation_fee' ? 'selected' : '' }}>Alojamiento</option>
                                <option value="options" {{ old('section', $rate->section) == 'options' ? 'selected' : '' }}>Opcionales</option>
                                <option value="registration" {{ old('section', $rate->section) == 'registration' ? 'selected' : '' }}>Inscripción</option>
                                <option value="discount_definition" {{ old('section', $rate->section) == 'discount_definition' ? 'selected' : '' }}>Descuento</option>
                                <option value="date_period" {{ old('section', $rate->section) == 'date_period' ? 'selected' : '' }}>Fechas</option>
                            </select>
                            @error('section') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                         <div class="form-group mb-3">
                            <label for="start_date" class="form-label">Válido Desde <span class="text-danger">*</span></label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $rate->start_date ? $rate->start_date->format('Y-m-d') : '') }}" required>
                            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="end_date" class="form-label">Válido Hasta <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $rate->end_date ? $rate->end_date->format('Y-m-d') : '') }}" required>
                            @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Columna Derecha --}}
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="summary" class="form-label">Resumen / Descripción <span class="text-danger">*</span></label>
                            <textarea name="summary" id="summary" class="form-control @error('summary') is-invalid @enderror" rows="5" required>{{ old('summary', $rate->summary) }}</textarea>
                            @error('summary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="tags_input" class="form-label">Etiquetas (separadas por coma) <span class="text-danger">*</span></label>
                            {{-- La variable $tags_input es pasada por el RateController@edit --}}
                            <input type="text" name="tags_input" id="tags_input" class="form-control @error('tags_input') is-invalid @enderror" value="{{ old('tags_input', $tags_input ?? '') }}" placeholder="ej: temporada alta, oferta especial" required>
                            @error('tags_input') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label>Tarifas Semanales (si aplica) <span class="text-danger">*</span></label>
                    <p class="small text-muted">Introducir el precio por semana. Si una semana no tiene tarifa para un tipo de año, dejar en blanco o poner 0.</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20%;">Semana</th>
                                    <th class="text-center" style="width: 40%;">Tarifa Año IMPAR (€)</th>
                                    <th class="text-center" style="width: 40%;">Tarifa Año PAR (€)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Asegurarse de que $rate->weekly_rates_details sea un array para old()
                                    $weekly_rates = old('weekly_rates', $rate->weekly_rates_details ?? []);
                                @endphp
                                @for($i = 1; $i <= 40; $i++) {{-- Extendido a 40 semanas para mayor flexibilidad --}}
                                <tr>
                                    <td class="text-center align-middle">{{ $i }} Semana(s)</td>
                                    <td>
                                        <input type="number" name="weekly_rates[odd][{{ $i }}]" class="form-control form-control-sm @error('weekly_rates.odd.'.$i) is-invalid @enderror" value="{{ $weekly_rates['odd'][$i] ?? '' }}" min="0" step="0.01" placeholder="0.00">
                                        @error('weekly_rates.odd.'.$i) <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="weekly_rates[even][{{ $i }}]" class="form-control form-control-sm @error('weekly_rates.even.'.$i) is-invalid @enderror" value="{{ $weekly_rates['even'][$i] ?? '' }}" min="0" step="0.01" placeholder="0.00">
                                        @error('weekly_rates.even.'.$i) <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    @error('weekly_rates') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="form-group mt-4">
                    <a href="{{ route('admin.rates.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Tarifa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
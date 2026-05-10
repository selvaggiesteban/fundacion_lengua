@extends('layouts/contentNavbarLayout')

@section('title', 'Listado de Tarifas')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Administración /</span> Tarifas
</h4>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    {{-- FORMULARIO PARA EL FILTRO POR SECCIÓN --}}
                    <form method="GET" action="{{ route('admin.rates.index') }}" id="filterSectionFormRates" class="filter col-12 col-md-auto mb-3 mb-md-0 d-flex align-items-center">
                        <label for="filter_section" class="form-label me-2 mb-0">Filtrar por Sección:</label>
                        <select id="filter_section" name="filter_section" class="form-select form-select-sm" onchange="document.getElementById('filterSectionFormRates').submit();">
                            <option value="" {{ (isset($selectedSection) && $selectedSection == '') || !isset($selectedSection) ? 'selected' : '' }}>Todas las secciones</option>
                            <option value="course_type" {{ (isset($selectedSection) && $selectedSection == 'course_type') ? 'selected' : '' }}>Tipo de curso</option>
                            <option value="accommodation_fee" {{ (isset($selectedSection) && $selectedSection == 'accommodation_fee') ? 'selected' : '' }}>Alojamiento</option>
                            <option value="options" {{ (isset($selectedSection) && $selectedSection == 'options') ? 'selected' : '' }}>Opcionales</option>
                            <option value="registration" {{ (isset($selectedSection) && $selectedSection == 'registration') ? 'selected' : '' }}>Inscripción</option>
                            <option value="discount_definition" {{ (isset($selectedSection) && $selectedSection == 'discount_definition') ? 'selected' : '' }}>Descuento</option>
                            <option value="date_period" {{ (isset($selectedSection) && $selectedSection == 'date_period') ? 'selected' : '' }}>Fechas</option>
                        </select>
                    </form>

                    <div class="buttons col-12 col-md-auto d-flex justify-content-end mt-3 mt-md-0">
                        <a href="{{ route('admin.rates.create') }}" class="btn btn-primary me-2">
                            <i class="ri-file-add-line me-1"></i> Nueva Tarifa
                        </a>
                        {{-- <button class="btn btn-secondary" id="export-csv-btn-rates" disabled>
                            <i class="ri-file-download-line me-1"></i> CSV
                        </button> --}}
                    </div>
                </div>
            </div>

            {{-- Mensajes de sesión para éxito o error --}}
            @if(session('success'))
                <div class="alert alert-success mx-4 mb-0">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger mx-4 mb-0">{{ session('error') }}</div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="datatables-rates table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Sección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rates as $rate)
                        <tr>
                            <td>{{ $rate->id }}</td>
                            <td>
                            <strong>{{ $rate->title }}</strong>
                            </td>
                            <td>{{ $rate->section_text }}</td> {{-- Usando el accesor del modelo Rate --}}
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.rates.show', $rate->id) }}" class="btn btn-sm btn-icon item-show me-1" title="Ver Tarifa/Fecha">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="{{ route('admin.rates.edit', $rate->id) }}" class="btn btn-sm btn-icon item-edit me-1" title="Editar Tarifa/Fecha">
                                        <i class="ri-pencil-line"></i>
                                    </a>
                                    <form action="{{ route('admin.rates.destroy', $rate->id) }}" method="POST" style="display:inline;" class="delete-rate-form" data-rate-title="{{ $rate->title }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon item-delete" title="Eliminar Tarifa/Fecha">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">
                                @if(isset($selectedSection) && $selectedSection != '')
                                  No hay Tarifas/Fechas que coincidan con la sección seleccionada.
                                @else
                                  No hay Tarifas/Fechas registradas.
                                @endif
                                <a href="{{ route('admin.rates.create') }}" class="ms-2">Crear una nueva</a>.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Script para confirmación de borrado --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('form.delete-rate-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevenir el envío inmediato
            const rateTitle = this.dataset.rateTitle;
            if (confirm(`¿Estás seguro de que quieres eliminar la tarifa/fecha: "${rateTitle}"? Esta acción no se puede deshacer.`)) {
                this.submit(); // Enviar el formulario si el usuario confirma
            }
        });
    });
});
</script>
@endsection
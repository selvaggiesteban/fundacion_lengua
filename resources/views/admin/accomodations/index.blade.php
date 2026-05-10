@extends('layouts/contentNavbarLayout')

@section('title', 'Lista de alojamientos') {{-- Título de la página actualizado --}}

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
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Administración /</span> Alojamientos
</h4>
<div class="row gy-6">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- Contenedor flex para alinear filtro y botones --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center">
          {{-- FORMULARIO PARA EL FILTRO POR SECCIÓN --}}
          <form method="GET" action="{{ route('admin.accomodations.index') }}" id="filterSectionForm" class="filter col-12 col-md-auto mb-3 mb-md-0 d-flex align-items-center">
            <label for="filter_section" class="form-label me-2 mb-0">Filtrar por Sección:</label>
            <select id="filter_section" name="filter_section" class="form-select form-select-sm" onchange="document.getElementById('filterSectionForm').submit();">
              <option value="" {{ (isset($selectedSection) && $selectedSection == '') || !isset($selectedSection) ? 'selected' : '' }}>Todas las secciones</option>
              {{-- Usamos los códigos que definimos para la BD y que el controlador espera --}}
              <option value="family_stay" {{ (isset($selectedSection) && $selectedSection == 'family_stay') ? 'selected' : '' }}>Alojamiento en familia</option>
              <option value="university_residence" {{ (isset($selectedSection) && $selectedSection == 'university_residence') ? 'selected' : '' }}>Residencia Universitaria</option>
              <option value="hotel" {{ (isset($selectedSection) && $selectedSection == 'hotel') ? 'selected' : '' }}>Hotel</option>
              <option value="apartment" {{ (isset($selectedSection) && $selectedSection == 'apartment') ? 'selected' : '' }}>Apartamento</option>
            </select>
          </form>

          <div class="buttons col-12 col-md-auto d-flex justify-content-end mt-3 mt-md-0">
            {{-- BOTÓN "NUEVO ALOJAMIENTO" CORREGIDO --}}
            <a href="{{ route('admin.accomodations.create') }}" class="btn btn-primary me-2">
              <i class="ri-file-add-line me-1"></i> Nuevo Alojamiento
            </a>
            <button class="btn btn-secondary" id="export-csv-btn">
              <i class="ri-export-line me-1"></i> Exportar
            </button>
          </div>
        </div>
      </div>

      <div class="table-responsive text-nowrap">
        <table class="datatables-accommodations table table-sm table-hover">
          <thead>
            <tr>
              <th class="text-truncate">ID</th>
              <th class="text-truncate">Nombre del alojamiento</th>
              <th class="text-truncate">Sección</th>
              <th class="text-truncate">Ciudad</th>
              <th class="text-truncate">País</th>
              <th class="text-truncate">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($accomodations as $accomodation)
            <tr>
              <td>{{ $accomodation->id }}</td>
              <td>
                <strong>{{ $accomodation->name }}</strong>
                @if($accomodation->tax_id)
                <div class="text-muted small">CIF/NIF: {{ $accomodation->tax_id }}</div>
                @endif
              </td>
              <td>{{ $accomodation->section_text }}</td> {{-- Usando el accesor del modelo Accomodation --}}
              <td>{{ $accomodation->city ?? 'N/A' }}</td>
              <td>{{ $accomodation->country ?? 'N/A' }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="{{ route('admin.accomodations.show', $accomodation->id) }}" class="btn btn-sm btn-icon item-show me-1" title="Ver">
                    <i class="ri-eye-line"></i>
                  </a>
                  <a href="{{ route('admin.accomodations.edit', $accomodation->id) }}" class="btn btn-sm btn-icon item-edit me-1" title="Editar">
                    <i class="ri-pencil-line"></i>
                  </a>
                  <form action="{{ route('admin.accomodations.destroy', $accomodation->id) }}" method="POST" style="display:inline;" class="delete-form-accomodation" data-accomodation-name="{{ $accomodation->name }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-icon item-delete" title="Eliminar">
                          <i class="ri-delete-bin-line"></i>
                      </button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center py-3">
                 @if(isset($selectedSection) && $selectedSection != '')
                  No hay alojamientos que coincidan con la sección seleccionada.
                @else
                  No hay alojamientos registrados.
                @endif
                <a href="{{ route('admin.accomodations.create') }}" class="ms-2">Crear un nuevo alojamiento</a>.
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('form.delete-form-accomodation');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const accomodationName = this.dataset.accomodationName;
            if (confirm(`¿Estás seguro de que quieres eliminar el alojamiento: ${accomodationName}? Esta acción no se puede deshacer.`)) {
                this.submit();
            }
        });
    });
});
</script>
@endsection 
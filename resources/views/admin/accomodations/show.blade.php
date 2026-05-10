@extends('layouts/contentNavbarLayout')

@section('title', 'Detalles del Alojamiento')

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
        <h5 class="mb-0">Detalles del Alojamiento: {{ $accomodation->name }}</h5>
        <div>
          <a href="{{ route('admin.accomodations.edit', $accomodation->id) }}" class="btn btn-primary me-2">
            <i class="ri-pencil-line me-1"></i> Editar
          </a>
          <a href="{{ route('admin.accomodations.index') }}" class="btn btn-secondary">
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
            <label class="form-label fw-bold">Sección</label>
            <div>
              @switch($accomodation->section)
                @case('family_stay')
                  Alojamiento en familia
                  @break
                @case('university_residence')
                  Residencia Universitaria
                  @break
                @case('hotel')
                  Hotel
                  @break
                @case('apartment')
                  Apartamento
                  @break
                @default
                  {{ $accomodation->section }}
              @endswitch
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Nombre del Alojamiento</label>
            <div>{{ $accomodation->name }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">CIF/NIF</label>
            <div>{{ $accomodation->tax_id }}</div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Dirección</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12 mb-3">
            <label class="form-label fw-bold">Dirección</label>
            <div>{{ $accomodation->address }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Código Postal</label>
            <div>{{ $accomodation->postal_code }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Ciudad</label>
            <div>{{ $accomodation->city }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Provincia</label>
            <div>{{ $accomodation->province }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">País</label>
            <div>{{ $accomodation->country }}</div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información de Contacto</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Teléfono Principal</label>
            <div>{{ $accomodation->phone_1 }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Teléfono Secundario</label>
            <div>{{ $accomodation->phone_2 ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Fax</label>
            <div>{{ $accomodation->fax ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Sitio Web</label>
            <div>
              @if($accomodation->website)
                <a href="{{ $accomodation->website }}" target="_blank">{{ $accomodation->website }}</a>
              @else
                No especificado
              @endif
            </div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Contacto Principal</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Nombre</label>
            <div>{{ $accomodation->contact1_name }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Cargo</label>
            <div>{{ $accomodation->contact1_position }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Email</label>
            <div><a href="mailto:{{ $accomodation->contact1_email }}">{{ $accomodation->contact1_email }}</a></div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Contacto Secundario</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Nombre</label>
            <div>{{ $accomodation->contact2_name ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Cargo</label>
            <div>{{ $accomodation->contact2_position ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Email</label>
            <div>
              @if($accomodation->contact2_email)
                <a href="mailto:{{ $accomodation->contact2_email }}">{{ $accomodation->contact2_email }}</a>
              @else
                No especificado
              @endif
            </div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información Adicional</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Información Extra 1</label>
            <div>{{ $accomodation->extra_info_1 ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Información Extra 2</label>
            <div>{{ $accomodation->extra_info_2 ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Otros Datos</label>
            <div>{{ $accomodation->other_data ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Observaciones</label>
            <div>{{ $accomodation->observations ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-12 mb-3">
            <label class="form-label fw-bold">Etiquetas</label>
            <div>
              @if($accomodation->tags->count() > 0)
                @foreach($accomodation->tags as $tag)
                  <span class="badge bg-primary me-1">{{ $tag->name }}</span>
                @endforeach
              @else
                No hay etiquetas asociadas
              @endif
            </div>
          </div>

          <div class="col-12 mt-4">
            <a href="{{ route('admin.accomodations.edit', $accomodation->id) }}" class="btn btn-primary me-2">
              <i class="ri-pencil-line me-1"></i> Editar
            </a>
            <a href="{{ route('admin.accomodations.index') }}" class="btn btn-secondary">
              <i class="ri-arrow-left-line me-1"></i> Volver al Listado
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
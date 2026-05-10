@extends('layouts/contentNavbarLayout')

@section('title', 'Panel de Administración')

@section('content')
<div class="row g-4">
  <!-- Bienvenida -->
  <div class="col-12">
    <div class="card bg-primary text-white">
      <div class="card-body">
        <div class="text-center">
          <h3 class="text-white mb-1">¡Bienvenido, {{ Auth::user()->name }}!</h3>
          <p class="mb-0 text-white-50">Panel de Administración - Fundación Lengua Española</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Métricas Principales -->
  <div class="col-12">
    <div class="row g-4">
      <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-lg me-3">
                <div class="avatar-initial bg-primary bg-gradient rounded">
                  <i class="ri-graduation-cap-line ri-32px text-white"></i>
                </div>
              </div>
              <div>
                <h3 class="mb-0 text-primary">{{ $totalStudents }}</h3>
                <p class="mb-0 text-muted">Total Estudiantes</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-lg me-3">
                <div class="avatar-initial bg-success bg-gradient rounded">
                  <i class="ri-user-star-line ri-32px text-white"></i>
                </div>
              </div>
              <div>
                <h3 class="mb-0 text-success">{{ $activeStudents }}</h3>
                <p class="mb-0 text-muted">Estudiantes Activos</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-lg me-3">
                <div class="avatar-initial bg-warning bg-gradient rounded">
                  <i class="ri-home-9-fill ri-32px text-white"></i>
                </div>
              </div>
              <div>
                <h3 class="mb-0 text-warning">{{ $totalAccommodations }}</h3>
                <p class="mb-0 text-muted">Alojamientos</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-lg me-3">
                <div class="avatar-initial bg-info bg-gradient rounded">
                  <i class="ri-money-euro-circle-line ri-32px text-white"></i>
                </div>
              </div>
              <div>
                <h3 class="mb-0 text-info">€{{ number_format($totalRevenue, 0) }}</h3>
                <p class="mb-0 text-muted">Ingresos Totales</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Estado del Sistema -->
  <div class="col-12">
    <div class="card border-0 shadow-sm">
      <div class="card-header bg-light border-0">
        <h5 class="mb-0 fw-bold">Estado del Sistema</h5>
      </div>
      <div class="card-body p-4">
        <div class="row g-4">
          <div class="col-md-4">
            <div class="text-center">
              <div class="mb-3">
                <div class="progress" style="height: 10px;">
                  <div class="progress-bar bg-primary" 
                       style="width: {{ $totalStudents > 0 ? round(($activeStudents / $totalStudents) * 100) : 0 }}%"></div>
                </div>
              </div>
              <h4 class="mb-1">{{ $totalStudents > 0 ? round(($activeStudents / $totalStudents) * 100) : 0 }}%</h4>
              <p class="mb-0 text-muted">Estudiantes Activos</p>
              <small class="text-primary">{{ $activeStudents }}/{{ $totalStudents }}</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="text-center">
              <div class="mb-3">
                <div class="progress" style="height: 10px;">
                  <div class="progress-bar bg-warning" 
                       style="width: {{ $totalAccommodations > 0 ? round(($accommodationsWithStudents / $totalAccommodations) * 100) : 0 }}%"></div>
                </div>
              </div>
              <h4 class="mb-1">{{ $totalAccommodations > 0 ? round(($accommodationsWithStudents / $totalAccommodations) * 100) : 0 }}%</h4>
              <p class="mb-0 text-muted">Alojamientos Ocupados</p>
              <small class="text-warning">{{ $accommodationsWithStudents }}/{{ $totalAccommodations }}</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="text-center">
              <div class="mb-3">
                <div class="progress" style="height: 10px;">
                  <div class="progress-bar bg-success" style="width: 100%"></div>
                </div>
              </div>
              <h4 class="mb-1">{{ $totalScholarships }}</h4>
              <p class="mb-0 text-muted">Becas Disponibles</p>
              <small class="text-success">Sistema Operativo</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Estudiantes por País -->
  <div class="col-lg-6">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-light border-0">
        <h5 class="mb-0 fw-bold">Estudiantes por País</h5>
      </div>
      <div class="card-body p-4">
        @forelse($studentsByCountry as $index => $country)
        <div class="d-flex justify-content-between align-items-center {{ $index < count($studentsByCountry) - 1 ? 'mb-3 pb-3 border-bottom' : '' }}">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <div class="avatar-initial bg-primary rounded-circle text-white fw-bold">
                {{ strtoupper(substr($country->country, 0, 2)) }}
              </div>
            </div>
            <div>
              <h6 class="mb-0 fw-bold">{{ $country->country }}</h6>
              <small class="text-muted">{{ $country->count }} {{ $country->count == 1 ? 'estudiante' : 'estudiantes' }}</small>
            </div>
          </div>
          <div class="text-end">
            <span class="badge bg-primary rounded-pill">{{ round(($country->count / $totalStudents) * 100, 1) }}%</span>
          </div>
        </div>
        @empty
        <div class="text-center py-4">
          <i class="ri-earth-line ri-48px text-muted mb-3"></i>
          <p class="text-muted mb-0">No hay datos de países disponibles</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>

  <!-- Acceso Rápido -->
  <div class="col-lg-6">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-light border-0">
        <h5 class="mb-0 fw-bold">Acceso Rápido</h5>
      </div>
      <div class="card-body p-4">
        <div class="row g-3">
          <div class="col-6">
            <a href="{{ route('admin.students.index') }}" class="btn btn-outline-primary w-100 p-3">
              <i class="ri-graduation-cap-line ri-24px mb-2"></i>
              <div class="fw-medium">Estudiantes</div>
            </a>
          </div>
          <div class="col-6">
            <a href="{{ route('admin.accomodations.index') }}" class="btn btn-outline-warning w-100 p-3">
              <i class="ri-home-9-fill ri-24px mb-2"></i>
              <div class="fw-medium">Alojamientos</div>
            </a>
          </div>
          <div class="col-6">
            <a href="{{ route('admin.scholarships.index') }}" class="btn btn-outline-success w-100 p-3">
              <i class="ri-award-line ri-24px mb-2"></i>
              <div class="fw-medium">Becas</div>
            </a>
          </div>
          <div class="col-6">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-info w-100 p-3">
              <i class="ri-money-euro-circle-line ri-24px mb-2"></i>
              <div class="fw-medium">Órdenes</div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@extends('layouts/contentNavbarLayout')

@section('title', 'Panel de Administrador')

@section('content')
<div class="row gy-4">
  <!-- Bienvenida -->
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <h4 class="mb-1">¡Bienvenido, {{ Auth::user()->name }}!</h4>
            <p class="mb-0 text-muted">Panel de Administración - Fundación Lengua Española</p>
          </div>
          <div class="text-end">
            <h3 class="text-primary mb-0">€{{ number_format($monthlyRevenue, 2) }}</h3>
            <small class="text-muted">Ingresos este mes</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Métricas Principales -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0">Métricas del Sistema</h5>
      </div>
      <div class="card-body">
        <div class="row g-4">
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-3 bg-primary bg-opacity-10 rounded">
              <div class="avatar me-3">
                <div class="avatar-initial bg-primary rounded">
                  <i class="ri-graduation-cap-line ri-24px text-white"></i>
                </div>
              </div>
              <div>
                <h4 class="mb-0 text-primary">{{ $totalStudents }}</h4>
                <p class="mb-0 small">Total Estudiantes</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-3 bg-success bg-opacity-10 rounded">
              <div class="avatar me-3">
                <div class="avatar-initial bg-success rounded">
                  <i class="ri-user-line ri-24px text-white"></i>
                </div>
              </div>
              <div>
                <h4 class="mb-0 text-success">{{ $activeStudents }}</h4>
                <p class="mb-0 small">Estudiantes Activos</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-3 bg-warning bg-opacity-10 rounded">
              <div class="avatar me-3">
                <div class="avatar-initial bg-warning rounded">
                  <i class="ri-home-9-fill ri-24px text-white"></i>
                </div>
              </div>
              <div>
                <h4 class="mb-0 text-warning">{{ $totalAccommodations }}</h4>
                <p class="mb-0 small">Total Alojamientos</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center p-3 bg-info bg-opacity-10 rounded">
              <div class="avatar me-3">
                <div class="avatar-initial bg-info rounded">
                  <i class="ri-money-euro-circle-line ri-24px text-white"></i>
                </div>
              </div>
              <div>
                <h4 class="mb-0 text-info">€{{ number_format($totalRevenue, 0) }}</h4>
                <p class="mb-0 small">Ingresos Totales</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Estado del Sistema -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0">Estado del Sistema</h5>
      </div>
      <div class="card-body">
        <div class="row g-4">
          <div class="col-md-4">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <span class="fw-medium">Estudiantes Activos</span>
              <span class="badge bg-primary">{{ $activeStudents }}/{{ $totalStudents }}</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-primary" 
                   style="width: {{ $totalStudents > 0 ? round(($activeStudents / $totalStudents) * 100) : 0 }}%" 
                   role="progressbar"></div>
            </div>
            <small class="text-muted">{{ $totalStudents > 0 ? round(($activeStudents / $totalStudents) * 100) : 0 }}% de ocupación</small>
          </div>
          <div class="col-md-4">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <span class="fw-medium">Alojamientos Ocupados</span>
              <span class="badge bg-warning">{{ $accommodationsWithStudents }}/{{ $totalAccommodations }}</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-warning" 
                   style="width: {{ $totalAccommodations > 0 ? round(($accommodationsWithStudents / $totalAccommodations) * 100) : 0 }}%" 
                   role="progressbar"></div>
            </div>
            <small class="text-muted">{{ $totalAccommodations > 0 ? round(($accommodationsWithStudents / $totalAccommodations) * 100) : 0 }}% ocupados</small>
          </div>
          <div class="col-md-4">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <span class="fw-medium">Becas Disponibles</span>
              <span class="badge bg-success">{{ $totalScholarships }}</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-success" style="width: 100%" role="progressbar"></div>
            </div>
            <small class="text-muted">Sistema operativo</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Acceso Rápido -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0">Acceso Rápido</h5>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-lg-3 col-md-6">
            <a href="{{ route('admin.students.index') }}" class="btn btn-outline-primary w-100">
              <i class="ri-graduation-cap-line me-2"></i>Gestionar Estudiantes
            </a>
          </div>
          <div class="col-lg-3 col-md-6">
            <a href="{{ route('admin.accomodations.index') }}" class="btn btn-outline-warning w-100">
              <i class="ri-home-9-fill me-2"></i>Gestionar Alojamientos
            </a>
          </div>
          <div class="col-lg-3 col-md-6">
            <a href="{{ route('admin.scholarships.index') }}" class="btn btn-outline-success w-100">
              <i class="ri-award-line me-2"></i>Gestionar Becas
            </a>
          </div>
          <div class="col-lg-3 col-md-6">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-info w-100">
              <i class="ri-money-euro-circle-line me-2"></i>Ver Órdenes
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
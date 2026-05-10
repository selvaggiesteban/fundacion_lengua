@extends('layouts/contentNavbarLayout')

@section('title', 'Spinners - Elementos de UI')


@section('content')
<!-- Estilo -->
<div class="card mb-6">
  <h5 class="card-header">Estilo</h5>
  <div class="row row-bordered g-0">
    <div class="col-md p-6">
      <div class="text-light small fw-medium">Borde</div>

      <div class="demo-inline-spacing">
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-secondary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-success" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-danger" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-warning" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-info" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-light" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-dark" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>
    </div>
    <div class="col-md p-6">
      <div class="text-light small fw-medium">Creciendo</div>

      <div class="demo-inline-spacing">
        <div class="spinner-grow" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-grow text-primary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-grow text-light" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-grow text-dark" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Estilo -->

<!-- Tamaño -->
<div class="card mb-6">
  <h5 class="card-header">Tamaño</h5>
  <div class="row row-bordered g-0">
    <!-- Grande -->
    <div class="col-md p-6">
      <div class="text-light small fw-medium">Grande</div>
      <div class="demo-inline-spacing">
        <div class="spinner-border spinner-border-lg text-primary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border spinner-border-lg text-secondary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>
    </div>

    <!-- Mediano -->
    <div class="col-md p-6">
      <div class="text-light small fw-medium">Mediano</div>
      <div class="demo-inline-spacing">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border text-secondary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>
    </div>

    <!-- Pequeño -->
    <div class="col-md p-6">
      <div class="text-light small fw-medium">Pequeño</div>
      <div class="demo-inline-spacing">
        <div class="spinner-border spinner-border-sm text-primary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="spinner-border spinner-border-sm text-secondary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Tamaño -->

@endsection

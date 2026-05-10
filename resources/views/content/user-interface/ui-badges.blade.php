@extends('layouts/contentNavbarLayout')

@section('title', 'Insignias - Elementos de UI')

@section('content')
<div class="row">
  <!-- Insignias Básicas -->
  <div class="col-lg">
    <div class="card mb-6">
      <h5 class="card-header">Insignias Básicas</h5>
      <div class="card-body">
        <div class="text-light small fw-medium">Por Defecto</div>
        <div class="demo-inline-spacing">
          <span class="badge bg-primary">Primario</span>
          <span class="badge bg-secondary">Secundario</span>
          <span class="badge bg-success">Éxito</span>
          <span class="badge bg-danger">Peligro</span>
          <span class="badge bg-warning">Advertencia</span>
          <span class="badge bg-info">Información</span>
          <span class="badge bg-dark">Oscuro</span>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <div class="text-light small fw-medium">Píldoras</div>

        <div class="demo-inline-spacing">
          <span class="badge rounded-pill bg-primary">Primario</span>
          <span class="badge rounded-pill bg-secondary">Secundario</span>
          <span class="badge rounded-pill bg-success">Éxito</span>
          <span class="badge rounded-pill bg-danger">Peligro</span>
          <span class="badge rounded-pill bg-warning">Advertencia</span>
          <span class="badge rounded-pill bg-info">Información</span>
          <span class="badge rounded-pill bg-dark">Oscuro</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Insignias de Etiqueta -->
  <div class="col-lg">
    <div class="card mb-6">
      <h5 class="card-header">Insignias de Etiqueta</h5>
      <div class="card-body">
        <div class="text-light small fw-medium">Etiqueta por Defecto</div>

        <div class="demo-inline-spacing">
          <span class="badge bg-label-primary">Primario</span>
          <span class="badge bg-label-secondary">Secundario</span>
          <span class="badge bg-label-success">Éxito</span>
          <span class="badge bg-label-danger">Peligro</span>
          <span class="badge bg-label-warning">Advertencia</span>
          <span class="badge bg-label-info">Información</span>
          <span class="badge bg-label-dark">Oscuro</span>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <div class="text-light small fw-medium">Etiquetas Píldoras</div>

        <div class="demo-inline-spacing">
          <span class="badge rounded-pill bg-label-primary">Primario</span>
          <span class="badge rounded-pill bg-label-secondary">Secundario</span>
          <span class="badge rounded-pill bg-label-success">Éxito</span>
          <span class="badge rounded-pill bg-label-danger">Peligro</span>
          <span class="badge rounded-pill bg-label-warning">Advertencia</span>
          <span class="badge rounded-pill bg-label-info">Información</span>
          <span class="badge rounded-pill bg-label-dark">Oscuro</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Botón con Insignias -->
  <div class="col-lg">
    <div class="card mb-6">
      <h5 class="card-header">Botón con Insignias</h5>
      <div class="row row-bordered g-0">
        <div class="col-lg-6 p-6">
          <small class="text-light fw-medium">Por Defecto</small>
          <div class="demo-vertical-spacing">
            <button type="button" class="btn btn-primary me-2">
              Texto
              <span class="badge badge-center bg-white text-primary ms-1">4</span>
            </button>
            <button type="button" class="btn btn-primary me-2">
              Texto
              <span class="badge badge-center bg-secondary rounded-pill ms-1">4</span>
            </button>
          </div>
        </div>
        <div class="col-lg-6 p-6">
          <small class="text-light fw-medium">Contorno</small>
          <div class="demo-vertical-spacing">
            <button type="button" class="btn btn-outline-primary me-2">
              Texto
              <span class="badge badge-center ms-1">4</span>
            </button>
            <button type="button" class="btn btn-outline-secondary me-2">
              Texto
              <span class="badge badge-center rounded-pill ms-1">4</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Estilo de Insignia Circular y Cuadrada -->
  <div class="col-12">
    <div class="card mb-6">
      <h5 class="card-header">Estilo de Insignia Circular y Cuadrada</h5>
      <div class="row row-bordered g-0">
        <div class="col-lg-6 p-6">
          <h6>Básico</h6>
          <div class="text-light small fw-medium mb-2">Por Defecto</div>
          <div class="demo-inline-spacing">
            <p>
              <span class="badge badge-center rounded-pill bg-primary">1</span>
              <span class="badge badge-center rounded-pill bg-secondary">2</span>
              <span class="badge badge-center rounded-pill bg-success">3</span>
              <span class="badge badge-center rounded-pill bg-danger">4</span>
              <span class="badge badge-center rounded-pill bg-warning">5</span>
              <span class="badge badge-center rounded-pill bg-info">6</span>
            </p>
            <p>
              <span class="badge badge-center bg-primary">1</span>
              <span class="badge badge-center bg-secondary">2</span>
              <span class="badge badge-center bg-success">3</span>
              <span class="badge badge-center bg-danger">4</span>
              <span class="badge badge-center bg-warning">5</span>
              <span class="badge badge-center bg-info">6</span>
            </p>
          </div>
        </div>
        <div class="col-lg-6 p-6">
          <h6>Etiqueta</h6>
          <div class="text-light small fw-medium mb-2">Por Defecto</div>
          <div class="demo-inline-spacing">
            <p>
              <span class="badge badge-center rounded-pill bg-label-primary">1</span>
              <span class="badge badge-center rounded-pill bg-label-secondary">2</span>
              <span class="badge badge-center rounded-pill bg-label-success">3</span>
              <span class="badge badge-center rounded-pill bg-label-danger">4</span>
              <span class="badge badge-center rounded-pill bg-label-warning">5</span>
              <span class="badge badge-center rounded-pill bg-label-info">6</span>
            </p>
            <p>
              <span class="badge badge-center bg-label-primary">1</span>
              <span class="badge badge-center bg-label-secondary">2</span>
              <span class="badge badge-center bg-label-success">3</span>
              <span class="badge badge-center bg-label-danger">4</span>
              <span class="badge badge-center bg-label-warning">5</span>
              <span class="badge badge-center bg-label-info">6</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

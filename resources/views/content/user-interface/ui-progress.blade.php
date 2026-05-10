@extends('layouts/contentNavbarLayout')

@section('title', 'Barras de progreso - Elementos de UI')

@section('content')
<!-- Opciones -->
<div class="card mb-6">
  <h5 class="card-header">Barras de progreso</h5>
  <div class="card-body">
    <div class="text-light small fw-medium">Predeterminado</div>
    <div class="demo-vertical-spacing">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress">
        <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
  <hr class="m-0" />
  <div class="card-body">
    <div class="text-light small fw-medium">Altura</div>
    <div class="demo-vertical-spacing">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress" style="height: 10px;">
        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
  <hr class="m-0" />
  <div class="card-body">
    <div class="text-light small fw-medium">Con Etiqueta</div>
    <div class="demo-vertical-spacing">
      <div class="progress" style="height: 12px;">
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
      </div>
      <div class="progress" style="height: 12px;">
        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
      </div>
    </div>
  </div>
</div>
<!--/ Opciones -->

<!-- Fondos -->
<div class="card mb-6">
  <h5 class="card-header">Fondos</h5>
  <div class="card-body">
    <div class="demo-vertical-spacing demo-only-element">
      <div class="progress bg-label-primary">
        <div class="progress-bar bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-secondary">
        <div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-success">
        <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-danger">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-warning">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-info">
        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-dark">
        <div class="progress-bar bg-dark" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!--/ Fondos -->

<!-- Rayado -->
<div class="card mb-6">
  <h5 class="card-header">Rayado</h5>
  <div class="card-body">
    <div class="demo-vertical-spacing demo-only-element">
      <div class="progress bg-label-primary">
        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-secondary">
        <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-success">
        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-danger">
        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-warning">
        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-info">
        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-dark">
        <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!--/ Rayado -->

<!-- Animado -->
<div class="card mb-6">
  <h5 class="card-header">Animado</h5>
  <div class="card-body">
    <div class="demo-vertical-spacing demo-only-element">
      <div class="progress bg-label-primary">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-secondary">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-success">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-danger">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-warning">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-info">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress bg-label-dark">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!--/ Animado -->

<!-- Múltiples barras -->
<div class="card">
  <h5 class="card-header">Múltiples barras</h5>
  <div class="card-body">
    <div class="text-light small fw-medium mb-1">Predeterminado</div>
    <div class="progress bg-lighter mb-4">
      <div class="progress-bar bg-primary" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
      <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="text-light small fw-medium mb-1">Rayado</div>
    <div class="progress bg-lighter mb-4">
      <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
      <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="text-light small fw-medium mb-1">Animado</div>
    <div class="progress bg-lighter">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
</div>
<!--/ Múltiples barras -->
@endsection

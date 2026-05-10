@extends('layouts/contentNavbarLayout')

@section('title', 'Información sobre herramientas y popovers - Elementos de UI')

<!-- Page Script -->
@section('page-script')
  @vite(['resources/assets/js/ui-popover.js'])
@endsection

@section('content')
<!-- Información sobre herramientas -->
<div class="card mb-6">
  <h5 class="card-header">Información sobre herramientas</h5>
  <div class="card-body">
    <div class="text-light small fw-medium">Direcciones</div>
    <div class="row demo-vertical-spacing">
      <div class="col">
        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Información sobre herramientas a la derecha">
          Derecha
        </button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Información sobre herramientas arriba">
          Arriba
        </button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Información sobre herramientas abajo">
          Abajo
        </button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" title="Información sobre herramientas a la izquierda">
          Izquierda
        </button>
      </div>
    </div>
  </div>
</div>
<!--/ Información sobre herramientas -->

<!-- Popovers -->
<div class="card">
  <h5 class="card-header">Popovers</h5>
  <div class="card-body">
    <div class="text-light small fw-medium">Direcciones</div>
    <div class="row demo-vertical-spacing">
      <div class="col">
        <button type="button" class="btn btn-primary text-nowrap" data-bs-animation="true" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Este es un popover muy bonito, muestra algo de amor." title="Título del Popover">
          Popover a la derecha
        </button>

      </div>
      <div class="col">
        <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Este es un popover muy bonito, muestra algo de amor." title="Título del Popover">
          Popover arriba
        </button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Este es un popover muy bonito, muestra algo de amor." title="Título del Popover">
          Popover abajo
        </button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="Este es un popover muy bonito, muestra algo de amor." title="Título del Popover">
          Popover a la izquierda
        </button>
      </div>
    </div>
  </div>
</div>
<!--/ Popovers -->
@endsection

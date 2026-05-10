@extends('layouts/contentNavbarLayout')

@section('title', 'Alertas - Elementos de UI')

@section('content')
<div class="row mb-6">
  <!-- Alertas Básicas -->
  <div class="col-md mb-6 mb-md-0">
    <div class="card">
      <h5 class="card-header">Alertas Básicas</h5>
      <div class="card-body">
        <div class="alert alert-primary" role="alert">
          ¡Esta es una alerta primaria — échale un vistazo!
        </div>

        <div class="alert alert-secondary" role="alert">
          ¡Esta es una alerta secundaria — échale un vistazo!
        </div>

        <div class="alert alert-success" role="alert">
          ¡Esta es una alerta de éxito — échale un vistazo!
        </div>

        <div class="alert alert-danger" role="alert">
          ¡Esta es una alerta de peligro — échale un vistazo!
        </div>

        <div class="alert alert-warning" role="alert">
          ¡Esta es una alerta de advertencia — échale un vistazo!
        </div>

        <div class="alert alert-info" role="alert">
          ¡Esta es una alerta de información — échale un vistazo!
        </div>

        <div class="alert alert-dark mb-0" role="alert">
          ¡Esta es una alerta oscura — échale un vistazo!
        </div>
      </div>
    </div>
  </div>
  <!--/ Alertas Básicas -->
  <!-- Alertas Descartables -->
  <div class="col-md">
    <div class="card">
      <h5 class="card-header">Alertas Descartables</h5>
      <div class="card-body">
        <div class="alert alert-primary alert-dismissible" role="alert">
          ¡Esta es una alerta primaria descartable — échale un vistazo!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar">
          </button>
        </div>

        <div class="alert alert-secondary alert-dismissible" role="alert">
          ¡Esta es una alerta secundaria descartable — échale un vistazo!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar">
          </button>
        </div>

        <div class="alert alert-success alert-dismissible" role="alert">
          ¡Esta es una alerta de éxito descartable — échale un vistazo!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar">
          </button>
        </div>

        <div class="alert alert-danger alert-dismissible" role="alert">
          ¡Esta es una alerta de peligro descartable — échale un vistazo!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar">
          </button>
        </div>

        <div class="alert alert-warning alert-dismissible" role="alert">
          ¡Esta es una alerta de advertencia descartable — échale un vistazo!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar">
          </button>
        </div>

        <div class="alert alert-info alert-dismissible" role="alert">
          ¡Esta es una alerta de información descartable — échale un vistazo!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar">
          </button>
        </div>

        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
          ¡Esta es una alerta oscura descartable — échale un vistazo!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar">
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--/ Alertas Descartables -->
</div>
@endsection

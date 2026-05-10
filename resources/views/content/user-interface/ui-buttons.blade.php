@extends('layouts/contentNavbarLayout')

@section('title', 'Botones - Elementos de UI')

@section('content')
<div class="row">
  <!-- Botones Básicos -->

  <div class="col-12">
    <div class="card mb-6">
      <h5 class="card-header">Botones Básicos</h5>
      <div class="card-body">
        <small class="text-light fw-medium">Por Defecto</small>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-primary">Primario</button>
          <button type="button" class="btn btn-secondary">Secundario</button>
          <button type="button" class="btn btn-success">Éxito</button>
          <button type="button" class="btn btn-danger">Peligro</button>
          <button type="button" class="btn btn-warning">Advertencia</button>
          <button type="button" class="btn btn-info">Información</button>
          <button type="button" class="btn btn-dark">Oscuro</button>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Redondeado</small>
        <div class="demo-inline-spacing">
          <button type="button" class="btn rounded-pill btn-primary">Primario</button>
          <button type="button" class="btn rounded-pill btn-secondary">Secundario</button>
          <button type="button" class="btn rounded-pill btn-success">Éxito</button>
          <button type="button" class="btn rounded-pill btn-danger">Peligro</button>
          <button type="button" class="btn rounded-pill btn-warning">Advertencia</button>
          <button type="button" class="btn rounded-pill btn-info">Información</button>
          <button type="button" class="btn rounded-pill btn-dark">Oscuro</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Botones de Contorno -->

  <div class="col-12">
    <div class="card mb-6">
      <h5 class="card-header">Botones de Contorno</h5>
      <div class="card-body">
        <small class="text-light fw-medium">Por Defecto</small>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-outline-primary">Primario</button>
          <button type="button" class="btn btn-outline-secondary">Secundario</button>
          <button type="button" class="btn btn-outline-success">Éxito</button>
          <button type="button" class="btn btn-outline-danger">Peligro</button>
          <button type="button" class="btn btn-outline-warning">Advertencia</button>
          <button type="button" class="btn btn-outline-info">Información</button>
          <button type="button" class="btn btn-outline-dark">Oscuro</button>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Redondeado</small>
        <div class="demo-inline-spacing">
          <button type="button" class="btn rounded-pill btn-outline-primary">Primario</button>
          <button type="button" class="btn rounded-pill btn-outline-secondary">Secundario</button>
          <button type="button" class="btn rounded-pill btn-outline-success">Éxito</button>
          <button type="button" class="btn rounded-pill btn-outline-danger">Peligro</button>
          <button type="button" class="btn rounded-pill btn-outline-warning">Advertencia</button>
          <button type="button" class="btn rounded-pill btn-outline-info">Información</button>
          <button type="button" class="btn rounded-pill btn-outline-dark">Oscuro</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Botones con Iconos -->

  <div class="col-12">
    <div class="card mb-6">
      <h5 class="card-header">Botones con Iconos</h5>
      <div class="row row-bordered g-0">
        <div class="col-lg-4 p-6">
          <small class="text-light fw-medium">Básico</small>
          <div class="demo-inline-spacing">
            <button type="button" class="btn btn-primary">
              <span class="tf-icons ri-checkbox-circle-line ri-16px me-1_5"></span>Primario
            </button>
            <button type="button" class="btn btn-secondary">
              <span class="tf-icons ri-notification-4-line ri-16px me-1_5"></span>Secundario
            </button>
          </div>
          <div class="demo-inline-spacing">
            <button type="button" class="btn rounded-pill btn-primary">
              <span class="tf-icons ri-checkbox-circle-line ri-16px me-1_5"></span>Primario
            </button>
            <button type="button" class="btn rounded-pill btn-secondary">
              <span class="tf-icons ri-notification-4-line ri-16px me-1_5"></span>Secundario
            </button>
          </div>
        </div>
        <div class="col-lg-4 p-6">
          <small class="text-light fw-medium">Contorno</small>
          <div class="demo-inline-spacing">
            <button type="button" class="btn btn-outline-primary">
              <span class="tf-icons ri-checkbox-circle-line ri-16px me-1_5"></span>Primario
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <span class="tf-icons ri-notification-4-line ri-16px me-1_5"></span>Secundario
            </button>
          </div>
          <div class="demo-inline-spacing">
            <button type="button" class="btn rounded-pill btn-outline-primary">
              <span class="tf-icons ri-checkbox-circle-line ri-16px me-1_5"></span>Primario
            </button>
            <button type="button" class="btn rounded-pill btn-outline-secondary">
              <span class="tf-icons ri-notification-4-line ri-16px me-1_5"></span>Secundario
            </button>
          </div>
        </div>
      </div>
      <hr class="m-0" />
      <div class="row row-bordered g-0">
        <div class="col-lg-4 p-6">
          <small class="text-light fw-medium">Básico</small>
          <div class="demo-inline-spacing">
            <button type="button" class="btn btn-icon btn-primary">
              <span class="tf-icons ri-check-double-line ri-22px"></span>
            </button>
            <button type="button" class="btn btn-icon btn-secondary">
              <span class="tf-icons ri-notification-4-line ri-22px"></span>
            </button>
            <button type="button" class="btn rounded-pill btn-icon btn-primary">
              <span class="tf-icons ri-check-double-line ri-22px"></span>
            </button>
            <button type="button" class="btn rounded-pill btn-icon btn-secondary">
              <span class="tf-icons ri-notification-4-line ri-22px"></span>
            </button>
          </div>
        </div>
        <div class="col-lg-4 p-6">
          <small class="text-light fw-medium">Contorno</small>
          <div class="demo-inline-spacing">
            <button type="button" class="btn btn-icon btn-outline-primary">
              <span class="tf-icons ri-check-double-line ri-22px"></span>
            </button>
            <button type="button" class="btn btn-icon btn-outline-secondary">
              <span class="tf-icons ri-notification-4-line ri-22px"></span>
            </button>
            <button type="button" class="btn rounded-pill btn-icon btn-outline-primary">
              <span class="tf-icons ri-check-double-line ri-22px"></span>
            </button>
            <button type="button" class="btn rounded-pill btn-icon btn-outline-secondary">
              <span class="tf-icons ri-notification-4-line ri-22px"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Opciones de Botón -->
  <div class="col-12">
    <div class="card mb-6">
      <h5 class="card-header">Opciones de Botón</h5>
      <div class="card-body">
        <small class="text-light fw-medium">Tamaños</small>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-xl btn-primary">Botón XL</button>
          <button type="button" class="btn btn-lg btn-primary">Botón LG</button>
          <button type="button" class="btn btn-primary">Botón</button>
          <button type="button" class="btn btn-sm btn-primary">Botón SM</button>
          <button type="button" class="btn btn-xs btn-primary">Botón XS</button>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Estado de los Botones</small>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-primary">Normal</button>
          <button type="button" class="btn btn-primary active">Activo</button>
          <button type="button" class="btn btn-primary" disabled>Desactivado</button>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Botones a nivel de bloque</small>
        <div class="row mt-4">
          <div class="d-grid gap-2 col-lg-6 mx-auto">
            <button class="btn btn-primary btn-lg" type="button">Botón</button>
            <button class="btn btn-secondary btn-lg" type="button">Botón</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Plugin de Botón -->
  <div class="col-12">
    <div class="card mb-6">
      <h5 class="card-header">Plugin de Botón</h5>
      <div class="row row-bordered g-0">
        <div class="col-xl-3 p-6">
          <div class="text-light small fw-medium">Estados de alternancia</div>
          <div class="demo-vertical-spacing">
            <button type="button" class="btn btn-primary d-block" data-bs-toggle="button">Botón de alternancia</button>
            <button type="button" class="btn btn-primary active d-block" data-bs-toggle="button" aria-pressed="true">Botón de alternancia activo</button>
            <button type="button" class="btn btn-primary d-block" disabled data-bs-toggle="button">Botón de alternancia desactivado</button>
          </div>
        </div>
        <div class="col-xl-3 p-6">
          <div class="text-light small fw-medium">Botones de alternancia de casilla de verificación</div>
          <div class="demo-vertical-spacing">
            <div class="d-block">
              <input type="checkbox" class="btn-check" id="btn-check">
              <label class="btn btn-primary" for="btn-check">Alternar uno</label>
            </div>
            <div class="d-block">
              <input type="checkbox" class="btn-check" id="btn-check-2" checked>
              <label class="btn btn-primary" for="btn-check-2">Marcado</label>
            </div>
            <div class="d-block">
              <input type="checkbox" class="btn-check" id="btn-check-3" checked>
              <label class="btn btn-primary" for="btn-check-3">Marcado</label>
            </div>
          </div>
        </div>
        <div class="col-xl-6 p-6">
          <div class="text-light small fw-medium">Casilla de verificación y radio</div>

          <div class="demo-vertical-spacing">
            <!-- Checkbox -->

            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
              <input type="checkbox" class="btn-check" id="btncheck1" checked>
              <label class="btn btn-outline-primary" for="btncheck1"><span class="d-block d-sm-none"><i class="ri-home-4-line ri-20px"></i></span><span class="d-none d-sm-block"> Casilla de verificación 1 (pre-marcada)</span></label>

              <input type="checkbox" class="btn-check" id="btncheck2">
              <label class="btn btn-outline-primary" for="btncheck2"><span class="d-block d-sm-none"><i class="ri-flight-takeoff-line ri-20px"></i></span><span class="d-none d-sm-block">Casilla de verificación 2</span></label>

              <input type="checkbox" class="btn-check" id="btncheck3">
              <label class="btn btn-outline-primary" for="btncheck3"><span class="d-block d-sm-none"><i class="ri-notification-4-line ri-20px"></i></span><span class="d-none d-sm-block">Casilla de verificación 3</span></label>
            </div>
            <br />
            <!-- Radio -->
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked>
              <label class="btn btn-outline-primary" for="btnradio1">Radio 1</label>
              <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
              <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label>
              <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
              <label class="btn btn-outline-primary" for="btnradio3">Radio 3</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Button Group -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Grupo de Botones</h5>
      <div class="card-body">
        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <small class="text-light fw-medium">Básico</small>
            <div class="mt-4">
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary">Izquierda</button>
                <button type="button" class="btn btn-secondary">Medio</button>
                <button type="button" class="btn btn-secondary">Derecha</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <small class="text-light fw-medium">Contorno</small>
            <div class="mt-4">
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-secondary">Izquierda</button>
                <button type="button" class="btn btn-outline-secondary">Medio</button>
                <button type="button" class="btn btn-outline-secondary">Derecha</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <div class="row">
          <div class="col-xl-6 mb-xl-0 mb-4">
            <small class="text-light fw-medium">Barra de herramientas de botones</small>
            <div class="btn-toolbar demo-inline-spacing gap-2" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-notification-4-line"></i></button>
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-calendar-line"></i></button>
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-shield-check-line"></i></button>
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-message-2-line"></i></button>
              </div>
              <div class="btn-group" role="group" aria-label="Second group">
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-bold"></i></button>
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-italic"></i></button>
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-underline"></i></button>
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-volume-up-line"></i></button>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <small class="text-light fw-medium">Anidamiento de botones</small>
            <div class="mt-4">
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-car-line"></i></button>
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-rocket-2-line"></i></button>
                <button type="button" class="btn btn-outline-secondary"><i class="tf-icons ri-lightbulb-line"></i></button>
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-more-2-line ri-20px"></i><span class="d-none d-sm-block">Desplegable</span></button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="javascript:void(0);">Enlace desplegable</a>
                    <a class="dropdown-item" href="javascript:void(0);">Enlace desplegable</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

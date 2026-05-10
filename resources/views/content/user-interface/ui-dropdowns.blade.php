@extends('layouts/contentNavbarLayout')

@section('title', 'Desplegables - Elementos de UI')

@section('content')
<div class="card mb-6" id="btn-dropdown-demo">
  <h5 class="card-header">Desplegables</h5>
  <!-- Desplegables Básicos -->
  <div class="card-body">
    <small class="text-light fw-medium">Básico</small>
    <div class="demo-inline-spacing">
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Primario</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item disabled" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Secundario</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Éxito</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Peligro</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Advertencia</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Información</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Desplegables Básicos -->

  <hr class="m-0">

  <!-- Desplegables con Contorno -->
  <div class="card-body">
    <small class="text-light fw-medium">Contorno</small>
    <div class="demo-inline-spacing">
      <div class="btn-group">
        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Primario</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Secundario</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Éxito</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-outline-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Peligro</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Advertencia</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Información</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Desplegables Básicos -->
  <hr class="m-0">
  <!-- Desplegables Divididos -->
  <div class="card-body">
    <small class="text-light fw-medium">Dividido</small>
    <div class="demo-inline-spacing">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Primario</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
          <span class="visually-hidden">Alternar Desplegable</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-secondary">Secundario</button>
        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
          <span class="visually-hidden">Alternar Desplegable</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-success">Éxito</button>
        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
          <span class="visually-hidden">Alternar Desplegable</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-danger">Peligro</button>
        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
          <span class="visually-hidden">Alternar Desplegable</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-warning">Advertencia</button>
        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
          <span class="visually-hidden">Alternar Desplegable</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-info">Información</button>
        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
          <span class="visually-hidden">Alternar Desplegable</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Desplegables Divididos -->

  <hr class="m-0">

  <div class="card-body">
    <div class="row gy-3">
      <!-- Desplegables con Flecha Oculta -->
      <div class="col-lg-3 col-sm-6 col-12">
        <small class="text-light fw-medium">Flecha oculta</small>
        <div class="demo-inline-spacing">
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">Flecha oculta </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Desplegables con Flecha Oculta -->
      <!-- Desplegable con icono -->
      <div class="col-lg-3 col-sm-6 col-12">
        <small class="text-light fw-medium">Con Icono</small>
        <div class="demo-inline-spacing">
          <div class="btn-group" id="dropdown-icon-demo">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-menu-line me-1"></i> Con Icono</button>
            <ul class="dropdown-menu">
              <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ri-arrow-right-s-line scaleX-n1-rtl"></i>Acción</a></li>
              <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ri-arrow-right-s-line scaleX-n1-rtl"></i>Otra acción</a></li>
              <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ri-arrow-right-s-line scaleX-n1-rtl"></i>Algo más aquí</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ri-arrow-right-s-line scaleX-n1-rtl"></i>Enlace separado</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Desplegable con icono -->
      <!-- Desplegable de Icono -->
      <div class="col-lg-3 col-sm-6 col-12">
        <small class="text-light fw-medium">Desplegable de Icono</small>
        <div class="demo-inline-spacing">
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-line"></i></button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Desplegable de Icono -->
    </div>
  </div>

</div>


<!-- Variaciones de Desplegable -->
<div class="card" id="dropdown-variation-demo">
  <h5 class="card-header">Variaciones de Desplegable</h5>

  <!-- Alineación del Menú Desplegable -->
  <div class="card-body">
    <small class="text-light fw-medium">Alineación del Menú</small>
    <div class="demo-inline-spacing">
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle overflow-hidden d-sm-inline-flex d-block text-truncate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menú desplegable alineado al final
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><button class="dropdown-item" type="button">Acción</button></li>
          <li><button class="dropdown-item" type="button">Otra acción</button></li>
          <li><button class="dropdown-item" type="button">Algo más aquí</button></li>
        </ul>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle overflow-hidden d-sm-inline-flex d-block text-truncate" data-bs-toggle="dropdown" data-bs-display="static" aria-haspopup="true" aria-expanded="false">
          Alineado al inicio pero alineado al final en pantalla grande
        </button>
        <ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end">
          <li><button class="dropdown-item" type="button">Acción</button></li>
          <li><button class="dropdown-item" type="button">Otra acción</button></li>
          <li><button class="dropdown-item" type="button">Algo más aquí</button></li>
        </ul>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle overflow-hidden d-sm-inline-flex d-block text-truncate" data-bs-toggle="dropdown" data-bs-display="static" aria-haspopup="true" aria-expanded="false">
          Alineado al final pero alineado al inicio en pantalla grande
        </button>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
          <li><button class="dropdown-item" type="button">Acción</button></li>
          <li><button class="dropdown-item" type="button">Otra acción</button></li>
          <li><button class="dropdown-item" type="button">Algo más aquí</button></li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Alineación del Menú Desplegable -->

  <hr class="m-0">
  <!-- Tamaños de Desplegable -->

  <div class="card-body">
    <small class="text-light fw-medium">Tamaños</small>
    <div class="demo-inline-spacing">
      <div class="btn-group">
        <button class="btn btn-primary btn-xl dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Botón extra grande
          </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Botón grande
          </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Botón pequeño
          </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Botón extra pequeño
          </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Tamaños de Desplegable -->

  <hr class="m-0">
  <div class="card-body">
    <div class="row gy-3">
      <!-- Direcciones de Desplegable -->
      <div class="col-xl-6">
        <small class="text-light fw-medium">Direcciones</small>
        <div class="row">
          <div class="col-md-6">
            <div class="demo-inline-spacing">
              <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Desplegable</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="demo-inline-spacing">
              <div class="btn-group dropup">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hacia arriba
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="demo-inline-spacing">
              <div class="btn-group dropend">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hacia la derecha</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="demo-inline-spacing">
              <div class="btn-group dropstart">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Hacia la izquierda</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Direcciones de Desplegable -->
      <!-- Contenido del menú desplegable -->
      <div class="col-xl-6">
        <small class="text-light fw-medium">Contenido del Menú</small>
        <div class="demo-inline-spacing">
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Encabezado del Desplegable
            </button>
            <ul class="dropdown-menu">
              <li>
                <h6 class="dropdown-header text-uppercase">Encabezado del desplegable</h6>
              </li>
              <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
            </ul>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Divisor
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
            </ul>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Texto
            </button>
            <div class="dropdown-menu">
              <div class="px-4 py-2 text-muted">
                <p>
                  Alguno ejemplo de texto que fluye libremente dentro del menú desplegable.
                </p>
                <p class="mb-0">
                  Y esto es más texto de ejemplo.
                </p>
              </div>
            </div>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Formularios
            </button>
            <div class="dropdown-menu dropdown-menu-end w-px-300">
              <form class="p-6" onsubmit="return false">
                <div class="form-floating form-floating-outline mb-6">
                  <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                  <label for="exampleDropdownFormEmail1">Dirección de correo electrónico</label>
                </div>
                <div class="form-floating form-floating-outline mb-6">
                  <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Contraseña">
                  <label for="exampleDropdownFormPassword1">Contraseña</label>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck"> Recordarme </label>
                  </div>
                </div>
                <button type="button" class="btn btn-primary">Iniciar sesión</button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void(0)">¿Nuevo por aquí? Regístrate</a>
              <a class="dropdown-item" href="javascript:void(0)">¿Olvidaste tu contraseña?</a>
            </div>
          </div>
        </div>
      </div>
      <!--/ Contenido del menú desplegable -->
    </div>
  </div>

  <hr class="m-0">
  <div class="card-body">
    <div class="row gy-3">
      <!-- Opciones de Desplegable -->
      <div class="col-xl-6">
        <small class="text-light fw-medium">Opciones: Usa <code>data-bs-offset</code> o <code>data-bs-reference</code> para cambiar la ubicación del desplegable.</small>
        <div class="demo-inline-spacing">
          <div class="btn-group me-1">
            <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
              Desplazamiento
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
              <li><a class="dropdown-item" href="javascript:void(0)">Acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
            </ul>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-primary">Referencia</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
              <span class="visually-hidden">Alternar Desplegable</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
              <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Opciones de Desplegable -->
      <!-- Comportamiento de cierre automático -->
      <div class="col-xl-6">
        <small class="text-light fw-medium">Comportamiento de cierre automático</small>
        <div class="demo-inline-spacing">
          <div class="btn-group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false"> Por defecto </button>
            <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
            </ul>
          </div>
          <div class="btn-group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false"> Clickeable fuera </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableOutside">
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
            </ul>
          </div>
          <div class="btn-group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"> Clickeable dentro </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
            </ul>
          </div>
          <div class="btn-group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuClickable" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false"> Cierre manual </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickable">
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Elemento del menú</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Comportamiento de cierre automático -->
    </div>
  </div>
</div>
<!--/ Variaciones de Desplegable -->
@endsection

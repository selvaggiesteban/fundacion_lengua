@extends('layouts/contentNavbarLayout')

@section('title', 'Barra de navegación - Elementos de UI')

@section('content')
<!-- Básico -->
<h5 class="pb-1 mb-6">Ejemplo</h5>
<nav class="navbar navbar-expand-lg navbar-light bg-lighter mb-12">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Barra de navegación</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegación">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="javascript:void(0)">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Enlace</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Desplegable
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="javascript:void(0)">Acción</a></li>
            <li><a class="dropdown-item" href="javascript:void(0)">Otra acción</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="javascript:void(0)">Algo más aquí</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="javascript:void(0)" tabindex="-1">Deshabilitado</a>
        </li>
      </ul>
      <form class="d-flex" onsubmit="return false">
        <input class="form-control form-control-sm me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-primary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
<!--/ Básico -->

<!-- Contenido compatible -->
<h5 class="pb-1 mb-6">Contenido compatible</h5>
<div class="mb-12">
  <h6 class="mt-2 mb-4 text-muted">Texto</h6>
  <nav class="navbar navbar-example navbar-expand-lg navbar-light bg-lighter">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">Barra de navegación</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2" aria-controls="navbar-ex-2" aria-expanded="false" aria-label="Alternar navegación">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-ex-2">
        <div class="navbar-nav me-auto">
          <a class="nav-item nav-link active" href="javascript:void(0)">Inicio</a>
          <a class="nav-item nav-link" href="javascript:void(0)">Acerca de</a>
          <a class="nav-item nav-link" href="javascript:void(0)">Contacto</a>
        </div>

        <span class="navbar-text">Malvavisco brownie gotas de limón tarta de queso.</span>
      </div>
    </div>
  </nav>

  <h6 class="mt-6 mb-4 text-muted">Grupo de entrada</h6>
  <nav class="navbar navbar-example navbar-expand-lg bg-lighter">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">Barra de navegación</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-4">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-ex-4">
        <div class="navbar-nav me-auto">
          <a class="nav-item nav-link active" href="javascript:void(0)">Inicio</a>
          <a class="nav-item nav-link" href="javascript:void(0)">Acerca de</a>
          <a class="nav-item nav-link" href="javascript:void(0)">Contacto</a>
        </div>

        <form class="d-flex">
          <div class="input-group input-group-sm">
            <span class="input-group-text"><i class="tf-icons ri-search-line"></i></span>
            <input type="text" class="form-control" placeholder="Buscar..." />
          </div>
        </form>
      </div>
    </div>
  </nav>

  <h6 class="mt-6 mb-4 text-muted">Botón</h6>
  <nav class="navbar navbar-example navbar-expand-lg bg-lighter">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">Barra de navegación</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-3">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-ex-3">
        <div class="navbar-nav me-auto">
          <a class="nav-item nav-link active" href="javascript:void(0)">Inicio</a>
          <a class="nav-item nav-link" href="javascript:void(0)">Acerca de</a>
          <a class="nav-item nav-link" href="javascript:void(0)">Contacto</a>
        </div>

        <form onsubmit="return false">
          <button class="btn btn-outline-primary" type="button">Comprar ahora</button>
        </form>
      </div>
    </div>
  </nav>
</div>
<!--/ Contenido compatible -->
@endsection

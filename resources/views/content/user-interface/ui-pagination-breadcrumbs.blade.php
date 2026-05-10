@extends('layouts/contentNavbarLayout')

@section('title', 'Paginación y migas de pan - Elementos de UI')

@section('content')
<div class="card mb-6">
  <h5 class="card-header">Paginación</h5>
  <!-- Paginación Básica -->
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <small class="text-light fw-medium">Básico</small>
        <div class="demo-inline-spacing">
          <!-- Paginación Básica -->
          <nav aria-label="Navegación de página">
            <ul class="pagination">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-left-s-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-right-s-line ri-22px"></i></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <!--/ Paginación Básica -->
          <!-- Paginación Básica Redondeada -->
          <nav aria-label="Navegación de página">
            <ul class="pagination pagination-rounded">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-left-s-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-right-s-line ri-22px"></i></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <!--/ Paginación Básica Redondeada -->


        </div>
      </div>
      <div class="col-lg-6">
        <small class="text-light fw-medium">Forma de Paginación Básica</small>
        <div class="demo-inline-spacing">
          <!-- Paginación de Contorno -->
          <nav aria-label="Navegación de página">
            <ul class="pagination pagination-outline-primary">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-left-s-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-right-s-line ri-22px"></i></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <!--/ Paginación de Contorno -->
          <!-- Paginación de Contorno Redondeada -->
          <nav aria-label="Navegación de página">
            <ul class="pagination pagination-rounded pagination-outline-primary">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-left-s-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-right-s-line ri-22px"></i></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <!--/ Paginación de Contorno Redondeada -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Paginación Básica -->

</div>
<!-- Tamaños de Paginación -->
<div class="card mb-6">
  <h5 class="card-header">Tamaños y Alineaciones</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-4">
        <small class="text-light fw-medium">Tamaños</small>
        <div class="demo-inline-spacing">
          <nav aria-label="Navegación de página">
            <ul class="pagination pagination-sm">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-20px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-20px"></i></a>
              </li>
            </ul>
          </nav>
          <nav aria-label="Navegación de página">
            <ul class="pagination">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <nav aria-label="Navegación de página">
            <ul class="pagination pagination-lg">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-24px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-24px"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-lg-8">
        <small class="text-light fw-medium">Alineaciones</small>
        <div class="demo-inline-spacing">
          <nav aria-label="Navegación de página">
            <ul class="pagination">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <nav aria-label="Navegación de página">
            <ul class="pagination justify-content-center">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <nav aria-label="Navegación de página">
            <ul class="pagination justify-content-end">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Tamaños de Paginación -->

<!-- Migas de pan -->
<div class="card">
  <h5 class="card-header">Migas de pan</h5>
  <div class="card-body">
    <!-- Miga de pan Básica -->
    <nav aria-label="miga de pan">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Biblioteca</a>
        </li>
        <li class="breadcrumb-item active">Datos</li>
      </ol>
    </nav>
    <!-- Miga de pan Básica -->
    <!-- Miga de pan estilo personalizado 1 -->
    <nav aria-label="miga de pan">
      <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Biblioteca</a>
        </li>
        <li class="breadcrumb-item active">Datos</li>
      </ol>
    </nav>
    <!--/ Miga de pan estilo personalizado 1 -->
    <!-- Miga de pan estilo personalizado 2 -->
    <nav aria-label="miga de pan">
      <ol class="breadcrumb breadcrumb-style2">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Biblioteca</a>
        </li>
        <li class="breadcrumb-item active">Datos</li>
      </ol>
    </nav>
    <!--/ Miga de pan estilo personalizado 2 -->
    <!-- Miga de pan Básica con icono -->
    <nav aria-label="miga de pan">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ri-star-fill ri-20px me-1 text-body"></i>Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ri-star-fill ri-20px me-1 text-body"></i>Biblioteca</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ri-star-fill ri-20px me-1"></i>Datos</a>
        </li>
      </ol>
    </nav>
    <!--/ Miga de pan Básica con icono -->
  </div>
</div>
<!--/ Migas de pan -->
@endsection

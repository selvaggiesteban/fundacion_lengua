@extends('layouts/contentNavbarLayout')

@section('title', 'OffCanvas - Elementos de UI')

@section('content')
<div class="card mb-6">
  <h5 class="card-header">Ubicaciones</h5>
  <div class="card-body">
    <div class="row gy-3">
      <!-- Offcanvas Predeterminado -->
      <div class="col-lg-3 col-md-6">
        <small class="text-light fw-medium mb-4">Inicio (Predeterminado)</small>
        <div class="mt-4">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasStart" aria-controls="offcanvasStart">Alternar Inicio</button>
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart" aria-labelledby="offcanvasStartLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasStartLabel" class="offcanvas-title">Offcanvas de Inicio</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
              <p class="text-center">Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.</p>
              <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continuar</button>
              <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Offcanvas Final -->
      <div class="col-lg-3 col-md-6">
        <small class="text-light fw-medium mb-4">Fin</small>
        <div class="mt-4">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">Alternar Fin</button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasEndLabel" class="offcanvas-title">Offcanvas de Fin</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
              <p class="text-center">Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.</p>
              <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continuar</button>
              <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Offcanvas Superior -->
      <div class="col-lg-3 col-md-6">
        <small class="text-light fw-medium mb-4">Superior</small>
        <div class="mt-4">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Alternar Superior</button>
          <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasTopLabel" class="offcanvas-title">Offcanvas Superior</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body">
              <p>Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.</p>
              <button type="button" class="btn btn-primary me-2">Continuar</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Offcanvas Inferior -->
      <div class="col-lg-3 col-md-6">
        <small class="text-light fw-medium mb-4">Inferior</small>
        <div class="mt-4">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Alternar Inferior</button>
          <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasBottomLabel" class="offcanvas-title">Offcanvas Inferior</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body">
              <p>Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.</p>
              <button type="button" class="btn btn-primary me-2">Continuar</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <h5 class="card-header">Fondo</h5>
  <div class="card-body">
    <div class="row gy-3">
      <!-- Offcanvas con Desplazamiento del Cuerpo Habilitado -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium mb-4">Habilitar Desplazamiento del Cuerpo</small>
        <div class="mt-4">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScroll" aria-controls="offcanvasScroll">Habilitar Desplazamiento del Cuerpo</button>
          <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScroll" aria-labelledby="offcanvasScrollLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasScrollLabel" class="offcanvas-title">Offcanvas con Desplazamiento</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
              <p class="text-center">Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.</p>
              <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continuar</button>
              <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Offcanvas con Fondo Habilitado (predeterminado) -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium mb-4">Habilitar fondo (predeterminado)</small>
        <div class="mt-4">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop">Habilitar fondo</button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop" aria-labelledby="offcanvasBackdropLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Habilitar fondo</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
              <p class="text-center">Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.</p>
              <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continuar</button>
              <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Offcanvas con Desplazamiento y Fondo Habilitados -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium mb-4">Habilitar Desplazamiento y Fondo</small>
        <div class="mt-4">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">Habilitar tanto desplazamiento como fondo</button>
          <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasBothLabel" class="offcanvas-title">Habilitar tanto desplazamiento como fondo</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
              <p class="text-center">Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.</p>
              <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continuar</button>
              <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

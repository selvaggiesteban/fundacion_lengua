@extends('layouts/contentNavbarLayout')

@section('title', 'Acordeón - Elementos de UI')

@section('content')
<!-- Acordeón -->
<h5>Acordeón</h5>
<div class="row">
  <div class="col-md mb-6 mb-md-2">
    <small class="text-light fw-medium">Acordeón Básico</small>
    <div class="accordion mt-4" id="accordionExample">
      <div class="accordion-item active">
        <h2 class="accordion-header" id="headingOne">
          <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
            Elemento del Acordeón 1
          </button>
        </h2>

        <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
            Elemento del Acordeón 2
          </button>
        </h2>
        <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
            Elemento del Acordeón 3
          </button>
        </h2>
        <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md">
    <small class="text-light fw-medium">Acordeón Sin Flecha</small>
    <div id="accordionIcon" class="accordion mt-4 accordion-without-arrow">
      <div class="accordion-item">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
            Elemento del Acordeón 1
          </button>
        </h2>

        <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
          <div class="accordion-body">
            Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.
          </div>
        </div>
      </div>

      <div class="accordion-item previous-active">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
            Elemento del Acordeón 2
          </button>
        </h2>
        <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
          <div class="accordion-body">
            Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.
          </div>
        </div>
      </div>

      <div class="accordion-item active">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconThree">
          <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionIcon-3" aria-expanded="true" aria-controls="accordionIcon-3">
            Elemento del Acordeón 3
          </button>
        </h2>
        <div id="accordionIcon-3" class="accordion-collapse collapse show" data-bs-parent="#accordionIcon">
          <div class="accordion-body">
            Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura del diseño. El pasaje se atribuye a un tipógrafo desconocido del siglo XV, quien se cree que mezcló partes de 'De Finibus Bonorum et Malorum' de Cicerón para usar en un libro de muestras tipográficas.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Acordeón -->
@endsection

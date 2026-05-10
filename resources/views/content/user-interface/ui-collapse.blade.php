@extends('layouts/contentNavbarLayout')

@section('title', 'Colapsar - Elementos de UI')

@section('content')
<!-- Colapsar -->
<h5>Colapsar</h5>
<div class="row">
  <div class="col-12">
    <div class="card mb-6">
      <h5 class="card-header">Básico</h5>
      <div class="card-body">
        <p class="card-text">
          Alterna la visibilidad del contenido en tu proyecto con unas pocas clases y nuestros plugins de JavaScript.
        </p>
        <p class="demo-inline-spacing">
          <a class="btn btn-primary me-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Enlace con href
          </a>
          <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Botón con data-bs-target
          </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="d-grid d-sm-flex p-4 border">
            <img src="{{asset('assets/img/elements/1.jpg')}}" alt="imagen-colapsable" height="125" class="me-6 mb-sm-0 mb-2">
            <span>
              Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de la industria desde el año 1500, cuando un impresor desconocido tomó una galera de tipos y los mezcló para hacer un libro de muestras tipográficas. Ha sobrevivido no solo cinco siglos, sino también el salto a la composición tipográfica electrónica, permaneciendo esencialmente sin cambios. Se popularizó en la década de 1960 con el lanzamiento de hojas de Letraset que contenían pasajes de Lorem Ipsum, y más recientemente con software de autoedición como Aldus PageMaker, incluyendo versiones de Lorem Ipsum. Es un hecho establecido desde hace mucho tiempo que un lector se distraerá con el contenido legible de una página al mirar su diseño. El objetivo de usar Lorem Ipsum es que tiene una distribución de letras más o menos normal.
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Múltiples objetivos</h5>
      <div class="card-body">
        <p class="card-text">Muestra y oculta múltiples elementos referenciándolos con un selector.</p>

        <p class="demo-inline-spacing">
          <a class="btn btn-primary me-1" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Alternar primer elemento</a>
          <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
            Alternar segundo elemento
          </button>
          <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
            Alternar ambos elementos
          </button>
        </p>
        <div class="row">
          <div class="col-12 col-md-6 mb-4 mb-md-0">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div class="d-grid d-sm-flex p-4 border">
                <img src="{{asset('assets/img/elements/2.jpg')}}" alt="imagen-colapsable" height="125" class="me-6 mb-sm-0 mb-2">
                <span>
                  Todos los generadores de Lorem Ipsum en Internet tienden a repetir trozos predefinidos según sea necesario, lo que convierte a este en el primer generador verdadero en Internet. Utiliza un diccionario de más de 200 palabras en latín, combinadas con un puñado de estructuras de oraciones modelo, para generar Lorem Ipsum que parece razonable.
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
              <div class="d-grid d-sm-flex p-4 border">
                <img src="{{asset('assets/img/elements/3.jpg')}}" alt="imagen-colapsable" height="125" class="me-6 mb-sm-0 mb-2">
                <span>
                  Hay muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la mayoría han sufrido alteraciones de alguna forma, por inyección de humor, o palabras aleatorias que no parecen ni siquiera un poco creíbles. Si vas a usar un pasaje de Lorem Ipsum.
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

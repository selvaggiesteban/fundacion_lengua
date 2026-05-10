@extends('layouts/contentNavbarLayout')

@section('title', 'Carrusel - Elementos de UI')

@section('content')
<div class="row">
  <!-- Carrusel de Bootstrap -->
  <div class="col-md">
    <h5 class="mb-6">Carrusel de Bootstrap</h5>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Diapositiva 1"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Diapositiva 2"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Diapositiva 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('assets/img/elements/13.jpg')}}" alt="Primera diapositiva" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Primera diapositiva</h3>
            <p>Este es un texto de ejemplo. Puede ser reemplazado con cualquier contenido relevante.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/2.jpg')}}" alt="Segunda diapositiva" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Segunda diapositiva</h3>
            <p>Este es otro texto de ejemplo. Se puede reemplazar con contenido relevante.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/18.jpg')}}" alt="Tercera diapositiva" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Tercera diapositiva</h3>
            <p>Un texto de ejemplo más. Ideal para mostrar la estructura.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </a>
    </div>
  </div>
  <!-- Carrusel de fundido cruzado de Bootstrap (oscuro) -->
  <div class="col-md">
    <h5 class="mb-6">Carrusel de fundido cruzado de Bootstrap (oscuro)</h5>

    <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Diapositiva 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Diapositiva 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Diapositiva 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('assets/img/elements/18.jpg')}}" alt="Primera diapositiva" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Primera diapositiva</h3>
            <p>Este es un texto de ejemplo. Puede ser reemplazado con cualquier contenido relevante.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/13.jpg')}}" alt="Segunda diapositiva" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Segunda diapositiva</h3>
            <p>Este es otro texto de ejemplo. Se puede reemplazar con contenido relevante.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/2.jpg')}}" alt="Tercera diapositiva" />
          <div class="carousel-caption d-none d-md-block">
            <h3>Tercera diapositiva</h3>
            <p>Un texto de ejemplo más. Ideal para mostrar la estructura.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </a>
    </div>
  </div>
</div>
@endsection

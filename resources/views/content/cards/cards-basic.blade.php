@extends('layouts/contentNavbarLayout')

@section('title', 'Tarjetas básicas - Elementos de interfaz de usuario')

@section('vendor-script')
@vite('resources/assets/vendor/libs/masonry/masonry.js')
@endsection

@section('content')
<!-- Ejemplos -->
<div class="row mb-12 g-6">
  <div class="col-md-6 col-lg-4">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar el cuerpo principal del contenido de la tarjeta.
        </p>
        <a href="javascript:void(0)" class="btn btn-outline-primary">Ir a algún lugar</a>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title mb-0">Título de la tarjeta</h5>
        <h6 class="card-subtitle">Subtítulo de tarjeta de soporte</h6>
      </div>
      <img class="img-fluid" src="{{asset('assets/img/elements/13.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <p class="card-text">Gominolas de sésamo con garra de oso y chocolate.</p>
        <a href="javascript:void(0);" class="card-link">Enlace de la tarjeta</a>
        <a href="javascript:void(0);" class="card-link">Otro enlace</a>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title mb-0">Título de la tarjeta</h5>
        <h6 class="card-subtitle">Subtítulo de tarjeta de soporte</h6>
        <img class="img-fluid d-flex mx-auto my-4 rounded" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" />
        <p class="card-text">Gominolas de sésamo con garra de oso y chocolate.</p>
        <a href="javascript:void(0);" class="card-link">Enlace de la tarjeta</a>
        <a href="javascript:void(0);" class="card-link">Otro enlace</a>
      </div>
    </div>
  </div>
</div>
<!--/ Ejemplos -->

<!-- Tipos de contenido -->
<h5 class="pb-1 mb-6">Tipos de contenido</h5>

<div class="row mb-12 g-6">
  <div class="col-md-6 col-lg-4">
    <h6 class="mt-2 text-muted">Cuerpo</h6>
    <div class="card mb-6">
      <div class="card-body">
        <p class="card-text">
          Este es un texto dentro del cuerpo de una tarjeta.
          Gominolas de limón, tiramisú, pastel de chocolate, algodón de azúcar, suflé, pastel de avena, rollo dulce. Ciruela azucarada, mazapán, gragea, cobertura de tarta de queso, barra de chocolate. Bollo danés, glaseado, donut.
        </p>
      </div>
    </div>
    <h6 class="mt-2 text-muted">Títulos, texto y enlaces</h6>
    <div class="card mb-6">
      <div class="card-body">
        <h5 class="card-title mb-0">Título de la tarjeta</h5>
        <div class="card-subtitle mb-3">Subtítulo de la tarjeta</div>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar el cuerpo principal del contenido de la tarjeta.
        </p>
        <a href="javascript:void(0)" class="card-link">Enlace de la tarjeta</a>
        <a href="javascript:void(0)" class="card-link">Otro enlace</a>
      </div>
    </div>
    <h6 class="mt-2 text-muted">Grupos de listas</h6>
    <div class="card mb-6">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <h6 class="mt-2 text-muted">Imágenes</h6>
    <div class="card">
      <img class="card-img-top" src="{{asset('assets/img/elements/5.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar el cuerpo principal del contenido de la tarjeta.
        </p>
        <p class="card-text">Cubierta de galleta, caramelos, jujubes, pan de jengibre. Piruleta, pastel de manzana, cupcake, bastones de caramelo, helado. Barquillo, barra de chocolate, pastel de zanahoria, gelatina.</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <h6 class="mt-2 text-muted">Fregadero de cocina</h6>
    <div class="card">
      <img class="card-img-top" src="{{asset('assets/img/elements/7.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta.
        </p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <div class="card-body">
        <a href="javascript:void(0)" class="card-link">Enlace de la tarjeta</a>
        <a href="javascript:void(0)" class="card-link">Otro enlace</a>
      </div>
    </div>
  </div>
</div>

<h6 class="pb-1 mb-6 text-muted">Encabezado y pie de página</h6>
<div class="row mb-12 g-6">
  <div class="col-md-6 col-lg-4">
    <div class="card">
      <div class="card-header">
        Destacado
      </div>
      <div class="card-body">
        <h5 class="card-title">Tratamiento de título especial</h5>
        <p class="card-text">
          Con texto de apoyo a continuación como una introducción natural a contenido adicional, una introducción natural a contenido adicional.
        </p>
        <a href="javascript:void(0)" class="btn btn-primary">Ir a algún lugar</a>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="card">
      <h5 class="card-header">Cita</h5>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit
            amet,
            consectetur.
          </p>
          <footer class="blockquote-footer">
            Alguien famoso en
            <cite title="Título de la fuente">Título de la fuente</cite>
          </footer>
        </blockquote>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="card text-center">
      <div class="card-header">
        Destacado
      </div>
      <div class="card-body">
        <h5 class="card-title">Tratamiento de título especial</h5>
        <p class="card-text">Con texto de apoyo a continuación como una introducción natural.</p>
        <a href="javascript:void(0)" class="btn btn-primary">Ir a algún lugar</a>
      </div>
      <div class="card-footer text-muted">
        Hace 2 días
      </div>
    </div>
  </div>
</div>
<!--/ Tipos de contenido -->

<!-- Alineación del texto -->
<h5 class="pb-1 mb-6">Alineación del texto</h5>
<div class="row mb-12 g-6">
  <div class="col-md-6 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tratamiento de título especial</h5>
        <p class="card-text">Con texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
        <a href="javascript:void(0)" class="btn btn-primary">Ir a algún lugar</a>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Tratamiento de título especial</h5>
        <p class="card-text">Con texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
        <a href="javascript:void(0)" class="btn btn-primary">Ir a algún lugar</a>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="card text-end">
      <div class="card-body">
        <h5 class="card-title">Tratamiento de título especial</h5>
        <p class="card-text">Con texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
        <a href="javascript:void(0)" class="btn btn-primary">Ir a algún lugar</a>
      </div>
    </div>
  </div>
</div>
<!--/ Alineación del texto -->

<!-- Navegación -->
<h5 class="pb-1 mb-6">Navegación</h5>
<div class="row mb-12 g-6">
  <div class="col-md-6">
    <div class="card text-center">
      <div class="card-header px-0 pt-0">
        <div class="nav-align-top">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-home" aria-controls="navs-tab-home" aria-selected="true">Inicio</button>
            </li>
            <li class="nav-item"><button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tab-profile" aria-controls="navs-tab-profile" aria-selected="false">Perfil</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link disabled" data-bs-toggle="tab" role="tab" aria-selected="false">Deshabilitado</button>
            </li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content p-0">
          <div class="tab-pane fade show active" id="navs-tab-home" role="tabpanel">
            <h5 class="card-title">Tratamiento de título especial</h5>
            <p class="card-text">Con texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
            <a href="javascript:void(0);" class="btn btn-primary">Ir a inicio</a>
          </div>
          <div class="tab-pane fade" id="navs-tab-profile" role="tabpanel">
            <h5 class="card-title">Tratamiento de título especial</h5>
            <p class="card-text">Con texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
            <a href="javascript:void(0);" class="btn btn-primary">Ir a perfil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card text-center">
      <div class="card-header">
        <div class="nav-align-top">
          <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-tab-home" aria-controls="navs-pills-tab-home" aria-selected="true">Inicio</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-tab-profile" aria-controls="navs-pills-tab-profile" aria-selected="false">Perfil</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link disabled" data-bs-toggle="tab" role="tab" aria-selected="false">Deshabilitado</button>
            </li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content p-0">
          <div class="tab-pane fade show active" id="navs-pills-tab-home" role="tabpanel">
            <h5 class="card-title">Tratamiento de título especial</h5>
            <p class="card-text">Con texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
            <a href="javascript:void(0);" class="btn btn-primary">Ir a inicio</a>
          </div>
          <div class="tab-pane fade" id="navs-pills-tab-profile" role="tabpanel">
            <h5 class="card-title">Tratamiento de título especial</h5>
            <p class="card-text">Con texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
            <a href="javascript:void(0);" class="btn btn-primary">Ir a perfil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Navegación -->

<!-- Bordes de imágenes y superposición -->
<h5 class="pb-1 mb-6">Bordes de imágenes y superposición</h5>
<div class="row mb-12 g-6">
  <div class="col-md-6 col-xl-4">
    <div class="card">
      <img class="card-img-top" src="{{asset('assets/img/elements/18.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">
          Esta es una tarjeta más ancha con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.
        </p>
        <p class="card-text">
          <small class="text-muted">Última actualización hace 3 minutos</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">
          Esta es una tarjeta más ancha con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.
        </p>
        <p class="card-text">
          <small class="text-muted">Última actualización hace 3 minutos</small>
        </p>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/1.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card bg-dark border-0 text-white">
      <img class="card-img" src="{{asset('assets/img/elements/11.jpg')}}" alt="Card image" />
      <div class="card-img-overlay">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">
          Esta es una tarjeta más ancha con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.
        </p>
        <p class="card-text">Última actualización hace 3 minutos</p>
      </div>
    </div>
  </div>
</div>
<!--/ Bordes de imágenes y superposición -->

<!-- Horizontal -->
<h5 class="pb-1 mb-6">Horizontal</h5>
<div class="row mb-12 g-6">
  <div class="col-md">
    <div class="card">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="{{asset('assets/img/elements/12.jpg')}}" alt="Card image" />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Título de la tarjeta</h5>
            <p class="card-text">
              Esta es una tarjeta más ancha con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido
              es un
              poco más largo.
            </p>
            <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="card">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Título de la tarjeta</h5>
            <p class="card-text">
              Esta es una tarjeta más ancha con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido
              es un
              poco más largo.
            </p>
            <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
          </div>
        </div>
        <div class="col-md-4">
          <img class="card-img card-img-right" src="{{asset('assets/img/elements/17.jpg')}}" alt="Card image" />
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Horizontal -->

<!-- Variación de estilo -->
<h5 class="pb-1 mb-4">Variación de estilo</h5>
<h6 class="pb-1 mb-4 text-muted">Predeterminado(sólido)</h6>
<div class="row g-6 mb-6">
  <div class="col-md-6 col-xl-4">
    <div class="card bg-primary text-white">
      <div class="card-body">
        <h5 class="card-title text-white">Título de la tarjeta principal</h5>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card bg-secondary text-white">
      <div class="card-body">
        <h5 class="card-title text-white">Título de la tarjeta secundaria</h5>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card bg-success text-white">
      <div class="card-body">
        <h5 class="card-title text-white">Título de la tarjeta de éxito</h5>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card bg-danger text-white">
      <div class="card-body">
        <h5 class="card-title text-white">Título de la tarjeta de peligro</h5>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card bg-warning text-white">
      <div class="card-body">
        <h5 class="card-title text-white">Título de la tarjeta de advertencia</h5>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card bg-info text-white">
      <div class="card-body">
        <h5 class="card-title text-white">Título de la tarjeta de información</h5>
        <p class="card-text">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
</div>
<!-- Contorno -->
<h6 class="pb-1 mb-4 text-muted">Contorno</h6>
<div class="row g-6">
  <div class="col-md-6 col-xl-4">
    <div class="card shadow-none bg-transparent border border-primary">
      <div class="card-body">
        <h5 class="card-title text-primary">Título de la tarjeta principal</h5>
        <p class="card-text text-primary">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card shadow-none bg-transparent border border-secondary">
      <div class="card-body">
        <h5 class="card-title text-secondary">Título de la tarjeta secundaria</h5>
        <p class="card-text text-secondary">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card shadow-none bg-transparent border border-success">
      <div class="card-body">
        <h5 class="card-title text-success">Título de la tarjeta de éxito</h5>
        <p class="card-text text-success">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card shadow-none bg-transparent border border-danger">
      <div class="card-body">
        <h5 class="card-title text-danger">Título de la tarjeta de peligro</h5>
        <p class="card-text text-danger">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card shadow-none bg-transparent border border-warning">
      <div class="card-body">
        <h5 class="card-title text-warning">Título de la tarjeta de advertencia</h5>
        <p class="card-text text-warning">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card shadow-none bg-transparent border border-info">
      <div class="card-body">
        <h5 class="card-title text-info">Título de la tarjeta de información</h5>
        <p class="card-text text-info">
          Texto de ejemplo rápido para construir sobre el título de la tarjeta y conformar.
        </p>
      </div>
    </div>
  </div>
</div>
<!--/ Variación de estilo -->


<!-- Diseño de tarjeta -->
<h5 class="pb-1 my-12">Diseño de tarjeta</h5>

<!-- Grupos de tarjetas -->
<h6 class="pb-1 mb-4 text-muted">Grupos de tarjetas</h6>
<div class="card-group mb-6">
  <div class="card">
    <img class="card-img-top" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" />
    <div class="card-body">
      <h5 class="card-title">Título de la tarjeta</h5>
      <p class="card-text">
        Esta es una tarjeta más ancha con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un
        poco
        más largo.
      </p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Última actualización hace 3 minutos</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{asset('assets/img/elements/5.jpg')}}" alt="Card image cap" />
    <div class="card-body">
      <h5 class="card-title">Título de la tarjeta</h5>
      <p class="card-text">Esta tarjeta tiene texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Última actualización hace 3 minutos</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{asset('assets/img/elements/1.jpg')}}" alt="Card image cap" />
    <div class="card-body">
      <h5 class="card-title">Título de la tarjeta</h5>
      <p class="card-text">
        Esta es una tarjeta más ancha con texto de apoyo a continuación como una introducción natural a contenido adicional. Esta tarjeta tiene aún
        más contenido que la primera para mostrar esa acción de igual altura.
      </p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Última actualización hace 3 minutos</small>
    </div>
  </div>
</div>

<!-- Tarjeta de cuadrícula -->
<h6 class="pb-1 mb-4 text-muted">Tarjeta de cuadrícula</h6>
<div class="row row-cols-1 row-cols-md-3 g-6 mb-6">
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta es una tarjeta más larga con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/13.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta es una tarjeta más larga con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta es una tarjeta más larga con texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/18.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta es una tarjeta más larga con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/19.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta es una tarjeta más larga con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/20.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta es una tarjeta más larga con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.</p>
      </div>
    </div>
  </div>
</div>

<!-- Mampostería -->
<h6 class="pb-1 mb-6 text-muted">Mampostería</h6>
<div class="row g-6" data-masonry='{"percentPosition": true }'>
  <div class="col-sm-6 col-lg-4">
    <div class="card">
      <img class="card-img-top" src="{{asset('assets/img/elements/5.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta que se ajusta a una nueva línea</h5>
        <p class="card-text">Esta es una tarjeta más larga con texto de apoyo a continuación como una introducción natural a contenido adicional. Este contenido es un poco más largo.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4">
    <div class="card p-3">
      <figure class="p-3 mb-0">
        <blockquote class="blockquote">
          <p>Una cita conocida, contenida en un elemento de cita.</p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-muted">
          Alguien famoso en <cite title="Título de la fuente">Título de la fuente</cite>
        </figcaption>
      </figure>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4">
    <div class="card">
      <img class="card-img-top" src="{{asset('assets/img/elements/18.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta tarjeta tiene texto de apoyo a continuación como una introducción natural a contenido adicional.</p>
        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4">
    <div class="card bg-primary text-white text-center p-3">
      <figure class="mb-0">
        <blockquote class="blockquote">
          <p>Una cita conocida, contenida en un elemento de cita.</p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-white">
          Alguien famoso en <cite title="Título de la fuente">Título de la fuente</cite>
        </figcaption>
      </figure>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta tarjeta tiene un título regular y un párrafo corto de texto debajo.</p>
        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4">
    <div class="card">
      <img class="card-img" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-sm-6 col-lg-4">
    <div class="card p-3 text-end">
      <figure class="mb-0">
        <blockquote class="blockquote">
          <p>Una cita conocida, contenida en un elemento de cita.</p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-muted">
          Alguien famoso en <cite title="Título de la fuente">Título de la fuente</cite>
        </figcaption>
      </figure>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Título de la tarjeta</h5>
        <p class="card-text">Esta es otra tarjeta con título y texto de apoyo debajo. Esta tarjeta tiene contenido adicional para hacerla un poco más alta en general.</p>
        <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p>
      </div>
    </div>
  </div>
</div>
<!--/ Diseño de tarjeta -->
@endsection

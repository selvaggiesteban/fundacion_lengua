@extends('layouts/contentNavbarLayout')

@section('title', 'Remix - Iconos')

@section('page-style')
@vite( 'resources/assets/vendor/scss/pages/page-icons.scss')
@endsection

@section('content')
<p>Puedes consultar la lista completa de iconos de Remix en <a href="https://remixicon.com/" target="_blank">https://remixicon.com/</a></p>

<!-- Contenedor de Iconos -->
<div class="d-flex flex-wrap" id="icons-container">
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-arrow-left-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Flecha izquierda</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-arrow-right-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Flecha derecha</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-home-4-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Inicio</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-home-gear-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Inicio (engranaje)</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-mail-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Correo</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-mail-open-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Abrir correo</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-brush-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Pincel</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-palette-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Paleta</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-line-chart-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Gráfico</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-pie-chart-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Gráfico circular</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-chat-4-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Chat</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-message-2-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Procesando mensaje</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-bold ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Negrita</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-italic ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Cursiva</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-html5-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">HTML 5</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-code-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Código</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-wifi-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Wifi</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-signal-wifi-error-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Error de señal</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-mac-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Mac</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-save-3-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Guardar</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-volume-up-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Subir volumen</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-volume-mute-line ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Silenciar volumen</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-linkedin-box-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">LinkedIn</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center mb-6 mx-3">
    <div class="card-body">
      <i class="ri-twitter-fill ri-36px"></i>
      <p class="icon-name text-capitalize text-truncate mb-0 mt-2">Twitter</p>
    </div>
  </div>
</div>

<!-- Botones -->
<div class="d-flex justify-content-center mx-auto gap-4">
  <a href="https://remixicon.com/" target="_blank" class="btn btn-primary">Ver todos los iconos</a>
  <a href="{{config('variables.documentation')}}/Icons.html" class="btn btn-primary" target="_blank">¿Cómo usar los iconos?</a>
</div>
@endsection

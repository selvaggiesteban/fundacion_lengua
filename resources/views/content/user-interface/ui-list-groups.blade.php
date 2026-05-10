@extends('layouts/contentNavbarLayout')

@section('title', 'Grupos de listas - Elementos de UI')

@section('content')
<div class="card mb-6">
  <h5 class="card-header">Grupos de listas</h5>
  <div class="card-body">
    <div class="row">
      <!-- Grupo de lista Básico -->
      <div class="col-lg-6 mb-6 mb-xl-0">
        <small class="text-light fw-medium">Básico</small>
        <div class="demo-inline-spacing mt-4">
          <div class="list-group">
            <a href="javascript:void(0);" class="list-group-item list-group-item-action active">Bizcocho de galleta de garra de oso</a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action">Soufflé de pastel de crema helado</a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action disabled">Tarta de tiramisú</a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action">Muffin de caramelo bonbon</a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action">Caramelo masticable Dragée</a>
          </div>
        </div>
      </div>
      <!--/ Grupo de lista Básico -->
      <!-- Grupo de lista con Insignias y Píldoras -->
      <div class="col-lg-6">
        <small class="text-light fw-medium">Con Insignias y Píldoras</small>
        <div class="demo-inline-spacing mt-4">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">Soufflé de
              pastel de crema helado
              <span class="badge bg-primary">5</span>
            </li>
            <li class="list-group-item disabled">Bizcocho de galleta de garra de oso</li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Tarta de
              tiramisú
              <span class="badge bg-success">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Muffin de
              caramelo bonbon
              <span class="badge bg-danger rounded-pill">3</span>
            </li>
            <li class="list-group-item">Caramelo masticable Dragée</li>
          </ul>
        </div>
      </div>
      <!--/ Grupo de lista con Insignias y Píldoras -->
    </div>
  </div>
  <hr class="m-0">
  <div class="card-body">
    <div class="row">
      <!-- Grupo de lista al ras (sin borde principal) -->
      <div class="col-lg-6 mb-6 mb-xl-0">
        <small class="text-light fw-medium">Al ras</small>
        <div class="demo-inline-spacing mt-4">
          <div class="list-group list-group-flush">
            <a href="javascript:void(0);" class="list-group-item list-group-item-action">Bizcocho de galleta de garra de oso</a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action">Soufflé de pastel de crema helado</a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action">Tarta de tiramisú</a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action">Muffin de caramelo bonbon</a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action">Caramelo masticable Dragée</a>
          </div>
        </div>
      </div>
      <!--/ Grupo de lista al ras (sin borde principal) -->
      <!-- Grupo de lista con Iconos -->
      <div class="col-lg-6">
        <small class="text-light fw-medium">Con Iconos</small>
        <div class="demo-inline-spacing mt-4">
          <ul class="list-group">
            <li class="list-group-item d-flex align-items-center">
              <i class="ri-computer-line ri-22px me-3"></i>
              Soufflé de pastel de crema helado
            </li>
            <li class="list-group-item d-flex align-items-center">
              <i class="ri-notification-4-line ri-22px me-3"></i>
              Bizcocho de galleta de garra de oso
            </li>
            <li class="list-group-item d-flex align-items-center">
              <i class="ri-headphone-fill ri-22px me-3"></i>
              Tarta de tiramisú
            </li>
            <li class="list-group-item d-flex align-items-center">
              <i class="ri-price-tag-3-line ri-22px me-3"></i>
              Muffin de caramelo bonbon
            </li>
            <li class="list-group-item d-flex align-items-center">
              <i class="ri-focus-2-line ri-22px me-3"></i>
              Caramelo masticable Dragée
            </li>
          </ul>
        </div>
      </div>
      <!--/ Grupo de lista con Iconos -->
    </div>
  </div>
  <hr class="m-0">
  <div class="card-body">
    <div class="row">
      <!-- Grupo de lista Numerado -->
      <div class="col-lg-6 mb-6 mb-xl-0">
        <small class="text-light fw-medium">Numerado</small>
        <div class="demo-inline-spacing mt-4">
          <ol class="list-group list-group-numbered">
            <li class="list-group-item">Bizcocho de galleta de garra de oso</li>
            <li class="list-group-item">Soufflé de pastel de crema helado</li>
            <li class="list-group-item">Tarta de tiramisú</li>
            <li class="list-group-item">Muffin de caramelo bonbon</li>
            <li class="list-group-item">Caramelo masticable Dragée</li>
          </ol>
        </div>
      </div>
      <!--/ Grupo de lista Numerado -->
      <!-- Grupo de lista con casilla de verificación -->
      <div class="col-lg-6">
        <small class="text-light fw-medium">Grupo de lista con casilla de verificación</small>
        <div class="demo-inline-spacing mt-4">
          <div class="list-group">
            <label class="list-group-item">
              <span class="form-check mb-0">
                <input class="form-check-input me-4" type="checkbox" value="">
                Soufflé de pastel de crema helado
              </span>
            </label>
            <label class="list-group-item">
              <span class="form-check mb-0">
                <input class="form-check-input me-4" type="checkbox" value="">
                Bizcocho de galleta de garra de oso
              </span>
            </label>
            <label class="list-group-item">
              <span class="form-check mb-0">
                <input class="form-check-input me-4" type="checkbox" value="">
                Tarta de tiramisú
              </span>
            </label>
            <label class="list-group-item">
              <span class="form-check mb-0">
                <input class="form-check-input me-4" type="checkbox" value="">
                Muffin de caramelo bonbon
              </span>
            </label>
            <label class="list-group-item">
              <span class="form-check mb-0">
                <input class="form-check-input me-4" type="checkbox" value="">
                Caramelo masticable Dragée
              </span>
            </label>
          </div>
        </div>
      </div>
      <!--/ Grupo de lista con casilla de verificación -->
    </div>
  </div>
  <hr class="m-0">
  <div class="card-body">
    <div class="row">
      <!-- Grupo de lista Contextual -->
      <div class="col-lg-6 mb-6 mb-xl-0">
        <small class="text-light fw-medium">Clases contextuales</small>
        <div class="demo-inline-spacing mt-4">
          <ul class="list-group">
            <li class="list-group-item list-group-item-primary">Elemento de grupo de lista primario</li>
            <li class="list-group-item list-group-item-secondary">Elemento de grupo de lista secundario</li>
            <li class="list-group-item list-group-item-success">Elemento de grupo de lista de éxito</li>
            <li class="list-group-item list-group-item-danger">Elemento de grupo de lista de peligro</li>
            <li class="list-group-item list-group-item-warning">Elemento de grupo de lista de advertencia</li>
            <li class="list-group-item list-group-item-info">Elemento de grupo de lista de información</li>
            <li class="list-group-item list-group-item-dark">Elemento de grupo de lista oscuro</li>
          </ul>
        </div>
      </div>
      <!--/ Grupo de lista Contextual -->
      <!-- Contenido personalizado con encabezado -->
      <div class="col-lg-6">
        <small class="text-light fw-medium">Contenido personalizado</small>
        <div class="demo-inline-spacing mt-4">
          <div class="list-group">
            <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start active">
              <div class="d-flex justify-content-between w-100">
                <h4 class="mb-1">Encabezado del elemento del grupo de lista</h4>
                <small>hace 3 días</small>
              </div>
              <p class="mb-1">Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura.</p>
              <small>Este es un texto de ejemplo.</small>
            </a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex justify-content-between w-100">
                <h4 class="mb-1">Encabezado del elemento del grupo de lista</h4>
                <small class="text-muted">hace 3 días</small>
              </div>
              <p class="mb-1">Este es un texto de ejemplo. Se puede reemplazar con cualquier contenido relevante. Es un texto de relleno para demostrar la estructura.</p>
              <small class="text-muted">Este es un texto de ejemplo.</small>
            </a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex justify-content-between w-100">
                <h4 class="mb-1">Encabezado del elemento del grupo de lista</h4>
                <small class="text-muted">hace 3 días</small>
              </div>
              <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              <small class="text-muted">Donec id elit non mi porta.</small>
            </a>
          </div>
        </div>
      </div>
      <!--/ Contenido personalizado con encabezado -->
    </div>
  </div>
</div>

<div class="card mb-6">
  <h5 class="card-header">Comportamiento de Javascript</h5>
  <div class="card-body">
    <div class="row">
      <!-- Contenido personalizado con encabezado -->
      <div class="col-lg-6 mb-6 mb-xl-0">
        <small class="text-light fw-medium">Vertical</small>
        <div class="mt-4">
          <div class="row">
            <div class="col-md-4 col-12 mb-4 mb-md-0">
              <div class="list-group">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home">Inicio</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile">Perfil</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages">Mensajes</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings">Ajustes</a>
              </div>
            </div>
            <div class="col-md-8 col-12">
              <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="list-home">
                  Texto de ejemplo para el contenido de la pestaña. Aquí se puede añadir cualquier tipo de información relevante o explicativa. Este es un texto de relleno para demostrar cómo se vería el contenido.
                </div>
                <div class="tab-pane fade" id="list-profile">
                  Más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno.
                </div>
                <div class="tab-pane fade" id="list-messages">
                  Contenido de ejemplo adicional para la pestaña. Útil para visualizar la disposición del texto. Este es un texto de relleno para fines de diseño.
                </div>
                <div class="tab-pane fade" id="list-settings">
                  Último fragmento de texto de ejemplo para la pestaña. Diseñado para mostrar cómo se verían los párrafos. Otro texto de relleno.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <small class="text-light fw-medium">Horizontal</small>
        <div class="demo-inline-spacing mt-4">
          <div class="list-group list-group-horizontal-md text-md-center">
            <a class="list-group-item list-group-item-action active" id="home-list-item" data-bs-toggle="list" href="#horizontal-home">Inicio</a>
            <a class="list-group-item list-group-item-action" id="profile-list-item" data-bs-toggle="list" href="#horizontal-profile">Perfil</a>
            <a class="list-group-item list-group-item-action" id="messages-list-item" data-bs-toggle="list" href="#horizontal-messages">Mensajes</a>
            <a class="list-group-item list-group-item-action" id="settings-list-item" data-bs-toggle="list" href="#horizontal-settings">Ajustes</a>
          </div>
          <div class="tab-content px-0 pt-1 mt-0">
            <div class="tab-pane fade show active" id="horizontal-home">
              Texto de ejemplo para el contenido de la pestaña. Aquí se puede añadir cualquier tipo de información relevante o explicativa. Este es un texto de relleno para demostrar cómo se vería el contenido.
            </div>
            <div class="tab-pane fade" id="horizontal-profile">
              Más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno.
            </div>
            <div class="tab-pane fade" id="horizontal-messages">
              Contenido de ejemplo adicional para la pestaña. Útil para visualizar la disposición del texto. Este es un texto de relleno para fines de diseño.
            </div>
            <div class="tab-pane fade" id="horizontal-settings">
              Último fragmento de texto de ejemplo para la pestaña. Diseñado para mostrar cómo se verían los párrafos. Otro texto de relleno.
            </div>
          </div>
        </div>
      </div>
      <!--/ Contenido personalizado con encabezado -->
    </div>
  </div>
</div>

@endsection
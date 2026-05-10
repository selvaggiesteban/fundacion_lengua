@extends('layouts/contentNavbarLayout')

@section('title', 'Pestañas y píldoras - Elementos de UI')

@section('content')
<!-- Pestañas -->
<h5 class="py-4 my-6">Pestañas</h5>

<div class="row gy-6">
  <div class="col-xl-6">
    <h6 class="text-muted">Básico</h6>
    <div class="card mb-6">
      <div class="card-header px-0 pt-0">
        <div class="nav-align-top">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">Inicio</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">Perfil</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false">Mensajes</button>
            </li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content p-0">
          <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
            <p>
              Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
            </p>
            <p class="mb-0">
              Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
            </p>
          </div>
          <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
            <p>
              Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
            </p>
            <p class="mb-0">
              Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
            </p>
          </div>
          <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
            <p>
              Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
            </p>
            <p class="mb-0">
              Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6">
    <h6 class="text-muted">Pestañas Rellenas</h6>
    <div class="card mb-6">
      <div class="card-header px-0 pt-0">
        <div class="nav-align-top">
          <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><span class="d-none d-sm-block"><i class="tf-icons ri-home-smile-line me-1_5"></i> Inicio <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">3</span></span><i class="ri-home-smile-line ri-20px d-sm-none"></i></button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ri-user-3-line me-1_5"></i> Perfil</span><i class="ri-user-3-line ri-20px d-sm-none"></i></button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ri-message-2-line me-1_5"></i> Mensajes</span><i class="ri-message-2-line ri-20px d-sm-none"></i></button>
            </li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content p-0">
          <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
            <p>
              Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
            </p>
            <p class="mb-0">
              Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
            </p>
          </div>
          <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
            <p>
              Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
            </p>
            <p class="mb-0">
              Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
            </p>
          </div>
          <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
            <p>
              Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
            </p>
            <p class="mb-0">
              Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Pestañas -->

<hr class="container-m-nx border-light mt-12" />

<!-- Píldoras -->
<h5 class="py-4 my-6">Píldoras</h5>

<div class="row gy-6">
  <div class="col-xl-6">
    <h6 class="text-muted">Básico</h6>
    <div class="nav-align-top mb-6">
      <ul class="nav nav-pills mb-4" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Inicio</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">Perfil</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">Mensajes</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
          <p>
            Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
          </p>
          <p class="mb-0">
            Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
          <p>
            Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
          </p>
          <p class="mb-0">
            Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
          <p>
            Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
          </p>
          <p class="mb-0">
            Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <h6 class="text-muted">Píldoras Rellenas</h6>
    <div class="nav-align-top mb-6">
      <ul class="nav nav-pills mb-4 nav-fill" role="tablist">
        <li class="nav-item mb-1 mb-sm-0">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true"><i class="tf-icons ri-home-smile-line me-1_5"></i> Inicio <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1_5 pt-50">3</span></button>
        </li>
        <li class="nav-item mb-1 mb-sm-0">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false"><i class="tf-icons ri-user-3-line me-1_5"></i> Perfil</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="false"><i class="tf-icons ri-message-2-line me-1_5"></i> Mensajes</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
          <p>
            Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
          </p>
          <p class="mb-0">
            Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
          <p>
            Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
          </p>
          <p class="mb-0">
            Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
          <p>
            Este es un texto de ejemplo para el contenido de una pestaña. Puede ser reemplazado por cualquier información relevante o explicativa. Es un texto de relleno para demostrar cómo se vería el contenido.
          </p>
          <p class="mb-0">
            Aquí puede ir más texto de ejemplo para el contenido de la pestaña. Proporciona una idea de cómo se estructuraría la información. Este es otro fragmento de texto de relleno para fines de demostración.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Píldoras -->
@endsection

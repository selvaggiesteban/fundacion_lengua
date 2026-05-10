@extends('layouts/contentNavbarLayout')

@section('title', 'Diseños Horizontales - Formularios')

@section('content')
<!-- Diseño Básico y Básico con Iconos -->
<div class="row">
  <!-- Diseño Básico -->
  <div class="col-xxl">
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Diseño Básico</h5> <small class="text-muted float-end">Etiqueta predeterminada</small>
      </div>
      <div class="card-body">
        <form>
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Empresa</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="basic-default-email">Correo electrónico</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
                <span class="input-group-text" id="basic-default-email2">@example.com</span>
              </div>
              <div class="form-text"> Puedes usar letras, números y puntos </div>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Número de teléfono</label>
            <div class="col-sm-10">
              <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Mensaje</label>
            <div class="col-sm-10">
              <textarea id="basic-default-message" class="form-control" placeholder="Hola, ¿tienes un momento para hablar Joe?" aria-label="Hola, ¿tienes un momento para hablar Joe?" aria-describedby="basic-icon-default-message2"></textarea>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Básico con Iconos -->
  <div class="col-xxl">
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Básico con Iconos</h5> <small class="text-muted float-end">Grupo de entrada fusionado</small>
      </div>
      <div class="card-body">
        <form>
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nombre</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ri-user-line ri-20px"></i></span>
                <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Empresa</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="ri-building-4-line ri-20px"></i></span>
                <input type="text" id="basic-icon-default-company" class="form-control" placeholder="ACME Inc." aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Correo electrónico</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="ri-mail-line ri-20px"></i></span>
                <input type="text" id="basic-icon-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
              </div>
              <div class="form-text"> Puedes usar letras, números y puntos </div>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Número de teléfono</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-phone2" class="input-group-text"><i class="ri-phone-fill ri-20px"></i></span>
                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Mensaje</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-message2" class="input-group-text"><i class="ri-chat-4-line ri-20px"></i></span>
                <textarea id="basic-icon-default-message" class="form-control" placeholder="Hola, ¿tienes un momento para hablar Joe?" aria-label="Hola, ¿tienes un momento para hablar Joe?" aria-describedby="basic-icon-default-message2"></textarea>
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

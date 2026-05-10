@extends('layouts/contentNavbarLayout')

@section('title', 'Grupos de entrada - Formularios')

@section('content')
<div class="row">
  <!-- Básico -->
  <div class="col-md-6">
    <div class="card mb-6">
      <h5 class="card-header">Básico</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">

        <div class="input-group">
          <span class="input-group-text" id="basic-addon41">@</span>
          <input type="text" class="form-control" placeholder="Nombre de usuario" aria-label="Nombre de usuario" aria-describedby="basic-addon41" />
        </div>

        <div class="form-password-toggle">
          <label class="form-label" for="basic-default-password42">Contraseña</label>
          <div class="input-group">
            <input type="password" class="form-control" id="basic-default-password42" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password42" />
            <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
          </div>
        </div>

        <div class="input-group">
          <input type="text" class="form-control" placeholder="Nombre de usuario del destinatario" aria-label="Nombre de usuario del destinatario" aria-describedby="basic-addon43" />
          <span class="input-group-text" id="basic-addon43">@example.com</span>
        </div>

        <div class="input-group">
          <span class="input-group-text" id="basic-addon44">https://example.com/users/</span>
          <input type="text" class="form-control" placeholder="URL" id="basic-url441" aria-describedby="basic-addon44" />
        </div>

        <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad (al dólar más cercano)" />
          <span class="input-group-text">.00</span>
        </div>

        <div class="input-group">
          <span class="input-group-text">Con área de texto</span>
          <textarea class="form-control" aria-label="Con área de texto" placeholder="Comentario" style="height: 60px;"></textarea>
        </div>

      </div>
    </div>
  </div>

  <!-- Fusionado -->
  <div class="col-md-6">
    <div class="card mb-6">
      <h5 class="card-header">Fusionado</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">

        <div class="input-group input-group-merge">
          <span class="input-group-text" id="basic-addon-search31"><i class="ri-search-line ri-20px"></i></span>
          <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon-search31" />
        </div>

        <div class="form-password-toggle">
          <label class="form-label" for="basic-default-password32">Contraseña</label>
          <div class="input-group input-group-merge">
            <input type="password" class="form-control" id="basic-default-password32" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password32" />
            <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
          </div>
        </div>

        <div class="input-group input-group-merge">
          <input type="text" class="form-control" placeholder="Nombre de usuario del destinatario" aria-label="Nombre de usuario del destinatario" aria-describedby="basic-addon33" />
          <span class="input-group-text" id="basic-addon33">@example.com</span>
        </div>

        <div class="input-group input-group-merge">
          <span class="input-group-text" id="basic-addon34">https://example.com/users/</span>
          <input type="text" class="form-control" id="basic-url3" aria-describedby="basic-addon34" />
        </div>

        <div class="input-group input-group-merge">
          <span class="input-group-text">$</span>
          <input type="number" class="form-control" placeholder="100" aria-label="Cantidad (al dólar más cercano)" />
          <span class="input-group-text">.00</span>
        </div>

        <div class="input-group input-group-merge">
          <span class="input-group-text">Con área de texto</span>
          <textarea class="form-control" aria-label="Con área de texto" style="height: 60px;"></textarea>
        </div>

      </div>
    </div>
  </div>

  <!-- Tamaño -->
  <div class="col-md-6">
    <div class="card mb-6">
      <h5 class="card-header">Tamaño</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">

        <div class="input-group input-group-lg">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" placeholder="Nombre de usuario" />
        </div>

        <div class="input-group">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" placeholder="Nombre de usuario" />
        </div>

        <div class="input-group input-group-sm">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" placeholder="Nombre de usuario" />
        </div>

      </div>
    </div>
  </div>
  <!-- Complementos de casilla de verificación y radio -->
  <div class="col-md-6">
    <div class="card mb-6">
      <h5 class="card-header">Complementos de casilla de verificación y radio</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <div class="input-group">
          <div class="input-group-text form-check mb-0">
            <input class="form-check-input m-auto" type="checkbox" value="" aria-label="Casilla de verificación para la entrada de texto siguiente">
          </div>
          <input type="text" class="form-control" aria-label="Entrada de texto con casilla de verificación">
        </div>
        <div class="input-group">
          <div class="input-group-text form-check mb-0">
            <input class="form-check-input m-auto" type="radio" value="" aria-label="Botón de radio para la entrada de texto siguiente">
          </div>
          <input type="text" class="form-control" aria-label="Entrada de texto con botón de radio">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Múltiples entradas y complemento -->
  <div class="col-md-6">
    <div class="card mb-6">
      <h5 class="card-header">Múltiples entradas y complemento</h5>

      <div class="card-body demo-vertical-spacing demo-only-element">
        <small class="text-light fw-medium d-block">Múltiples entradas</small>
        <div class="input-group">
          <span class="input-group-text">Nombre y apellido</span>
          <input type="text" aria-label="Nombre" class="form-control">
          <input type="text" aria-label="Apellido" class="form-control">
        </div>

        <small class="text-light fw-medium d-block pt-4">Múltiples complementos</small>
        <div class="input-group">
          <span class="input-group-text">$</span>
          <span class="input-group-text">0.00</span>
          <input type="text" class="form-control" aria-label="Cantidad en dólares (con punto y dos decimales)">
        </div>

        <div class="input-group">
          <input type="text" class="form-control" aria-label="Cantidad en dólares (con punto y dos decimales)">
          <span class="input-group-text">$</span>
          <span class="input-group-text">0.00</span>
        </div>
      </div>

    </div>
  </div>
  <!-- Voz a texto -->
  <div class="col-md-6">
    <div class="card mb-6">
      <h5 class="card-header">Voz a texto</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">

        <small class="text-light fw-medium d-block">Grupo de entrada</small>

        <div class="input-group input-group-merge speech-to-text">
          <input type="text" class="form-control" placeholder="Dilo" aria-describedby="text-to-speech-addon">
          <span class="input-group-text" id="text-to-speech-addon">
            <i class='ri-mic-line ri-20px cursor-pointer text-to-speech-toggle'></i>
          </span>
        </div>

        <small class="text-light fw-medium d-block pt-4">Área de texto</small>

        <div class="input-group input-group-merge speech-to-text">
          <textarea class="form-control" placeholder="Dilo" rows="2"></textarea>
          <span class="input-group-text">
            <i class='ri-mic-line ri-20px cursor-pointer text-to-speech-toggle'></i>
          </span>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Botón con desplegables y complementos -->
<div class="row">
  <div class="col-md-6">
    <div class="card mb-6">
      <h5 class="card-header">Botón con desplegables y complementos</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <small class="text-light fw-medium d-block">Complementos de botón</small>
        <div class="input-group">
          <button class="btn btn-outline-primary" type="button" id="button-addon1">Botón</button>
          <input type="text" class="form-control" placeholder="" aria-label="Ejemplo de texto con complemento de botón" aria-describedby="button-addon1">
        </div>

        <div class="input-group">
          <input type="text" class="form-control" placeholder="Nombre de usuario del destinatario" aria-label="Nombre de usuario del destinatario" aria-describedby="button-addon2">
          <button class="btn btn-outline-primary" type="button" id="button-addon2">Botón</button>
        </div>

        <div class="input-group">
          <button class="btn btn-outline-primary" type="button">Botón</button>
          <button class="btn btn-outline-primary" type="button">Botón</button>
          <input type="text" class="form-control" placeholder="" aria-label="Ejemplo de texto con dos complementos de botón">
        </div>

        <div class="input-group">
          <input type="text" class="form-control" placeholder="Nombre de usuario del destinatario" aria-label="Nombre de usuario del destinatario con dos complementos de botón">
          <button class="btn btn-outline-primary" type="button">Botón</button>
          <button class="btn btn-outline-primary" type="button">Botón</button>
        </div>

        <small class="text-light fw-medium d-block pt-4">Botón con desplegables</small>
        <div class="input-group">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Desplegable</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
          </ul>
          <input type="text" class="form-control" aria-label="Entrada de texto con botón de desplegable">
        </div>

        <div class="input-group">
          <input type="text" class="form-control" aria-label="Entrada de texto con botón de desplegable">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Desplegable</button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
          </ul>
        </div>

        <div class="input-group">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Desplegable</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">Acción anterior</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Otra acción anterior</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
          </ul>
          <input type="text" class="form-control" aria-label="Entrada de texto con 2 botones de desplegable">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Desplegable</button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-6">

    <!-- Botones segmentados -->
    <div class="row">
      <div class="col-12">
        <div class="card mb-6">
          <h5 class="card-header">Botones segmentados</h5>
          <div class="card-body demo-vertical-spacing demo-only-element">
            <div class="input-group">
              <button type="button" class="btn btn-outline-primary">Acción</button>
              <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Alternar Desplegable</span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
              </ul>
              <input type="text" class="form-control" aria-label="Entrada de texto con botón de desplegable segmentado">
            </div>

            <div class="input-group">
              <input type="text" class="form-control" aria-label="Entrada de texto con botón de desplegable segmentado">
              <button type="button" class="btn btn-outline-primary">Acción</button>
              <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Alternar Desplegable</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:void(0);">Acción</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Otra acción</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Algo más aquí</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="javascript:void(0);">Enlace separado</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Selección personalizada -->
    <div class="row">
      <div class="col-12">
        <div class="card mb-6">
          <h5 class="card-header">Selección personalizada</h5>
          <div class="card-body demo-vertical-spacing demo-only-element">
            <div class="input-group">
              <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
              <select class="form-select" id="inputGroupSelect01">
                <option selected>Elegir...</option>
                <option value="1">Uno</option>
                <option value="2">Dos</option>
                <option value="3">Tres</option>
              </select>
            </div>

            <div class="input-group">
              <select class="form-select" id="inputGroupSelect02">
                <option selected>Elegir...</option>
                <option value="1">Uno</option>
                <option value="2">Dos</option>
                <option value="3">Tres</option>
              </select>
              <label class="input-group-text" for="inputGroupSelect02">Opciones</label>
            </div>

            <div class="input-group">
              <button class="btn btn-outline-primary" type="button">Botón</button>
              <select class="form-select" id="inputGroupSelect03" aria-label="Ejemplo de selección con complemento de botón">
                <option selected>Elegir...</option>
                <option value="1">Uno</option>
                <option value="2">Dos</option>
                <option value="3">Tres</option>
              </select>
            </div>

            <div class="input-group">
              <select class="form-select" id="inputGroupSelect04" aria-label="Ejemplo de selección con complemento de botón">
                <option selected>Elegir...</option>
                <option value="1">Uno</option>
                <option value="2">Dos</option>
                <option value="3">Tres</option>
              </select>
              <button class="btn btn-outline-primary" type="button">Botón</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Entrada de archivo personalizada -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Entrada de archivo personalizada</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <div class="input-group">
          <label class="input-group-text" for="inputGroupFile01">Subir</label>
          <input type="file" class="form-control" id="inputGroupFile01">
        </div>

        <div class="input-group">
          <input type="file" class="form-control" id="inputGroupFile02">
          <label class="input-group-text" for="inputGroupFile02">Subir</label>
        </div>

        <div class="input-group">
          <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon03">Botón</button>
          <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Subir">
        </div>

        <div class="input-group">
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Subir">
          <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Botón</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

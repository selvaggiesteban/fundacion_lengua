@extends('layouts/contentNavbarLayout')

@section('title', 'Entradas básicas - Formularios')

@section('page-script')
@vite('resources/assets/js/form-basic-inputs.js')
@endsection

@section('content')
<div class="row g-6 mb-6">

  <!-- Etiqueta flotante (Contorno) -->
  <div class="col-md">
    <div class="card">
      <h5 class="card-header">Etiqueta flotante (Contorno)</h5>
      <div class="card-body">
        <div class="form-floating form-floating-outline">
          <input type="text" class="form-control" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInputHelp" />
          <label for="floatingInput">Nombre</label>
          <div id="floatingInputHelp" class="form-text">Nunca compartiremos tus datos con nadie más.</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Predeterminado -->
  <div class="col-md">
    <div class="card">
      <h5 class="card-header">Predeterminado</h5>
      <div class="card-body">
        <div>
          <label for="defaultFormControlInput" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe" aria-describedby="defaultFormControlHelp" />
          <div id="defaultFormControlHelp" class="form-text">Nunca compartiremos tus datos con nadie más.</div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row g-6">
  <!-- Controles de formulario -->
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">Controles de formulario</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <div class="form-floating form-floating-outline mb-6">
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" />
          <label for="exampleFormControlInput1">Dirección de correo electrónico</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
            <option selected>Abrir este menú de selección</option>
            <option value="1">Uno</option>
            <option value="2">Dos</option>
            <option value="3">Tres</option>
          </select>
          <label for="exampleFormControlSelect1">Ejemplo de selección</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Escribe para buscar...">
          <datalist id="datalistOptions">
            <option value="San Francisco"></option>
            <option value="New York"></option>
            <option value="Seattle"></option>
            <option value="Los Angeles"></option>
            <option value="Chicago"></option>
          </datalist>
          <label for="exampleDataList">Ejemplo de lista de datos</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <select multiple class="form-select h-px-100" id="exampleFormControlSelect2" aria-label="Multiple select example">
            <option selected>Abrir este menú de selección</option>
            <option value="1">Uno</option>
            <option value="2">Dos</option>
            <option value="3">Tres</option>
          </select>
          <label for="exampleFormControlSelect2">Ejemplo de selección múltiple</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <textarea class="form-control h-px-100" id="exampleFormControlTextarea1" placeholder="Comentarios aquí..."></textarea>
          <label for="exampleFormControlTextarea1">Ejemplo de área de texto</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="Campo de solo lectura aquí..." readonly />
          <label for="exampleFormControlReadOnlyInput1">Solo lectura sin valor</label>
        </div>
        <div class="form-floating form-floating-outline">
          <input type="text" readonly class="form-control-plaintext px-0" id="exampleFormControlReadOnlyInputPlain1" value="email@example.com" />
          <label for="exampleFormControlReadOnlyInputPlain1" class="px-0">Solo lectura con valor</label>
        </div>
      </div>
    </div>
  </div>

  <!-- Tamaño de entrada -->
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">Tamaño de entrada</h5>
      <div class="card-body">
        <small class="text-light fw-medium">Texto de entrada</small>

        <div class="mt-2 mb-4">
          <label for="largeInput" class="form-label">Entrada grande</label>
          <input id="largeInput" class="form-control form-control-lg" type="text" placeholder=".form-control-lg" />
        </div>
        <div class="mb-4">
          <label for="defaultInput" class="form-label">Entrada predeterminada</label>
          <input id="defaultInput" class="form-control" type="text" placeholder="Entrada predeterminada" />
        </div>
        <div>
          <label for="smallInput" class="form-label">Entrada pequeña</label>
          <input id="smallInput" class="form-control form-control-sm" type="text" placeholder=".form-control-sm" />
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Selección de entrada</small>
        <div class="mt-2 mb-4">
          <label for="largeSelect" class="form-label">Selección grande</label>
          <select id="largeSelect" class="form-select form-select-lg">
            <option>Selección grande</option>
            <option value="1">Uno</option>
            <option value="2">Dos</option>
            <option value="3">Tres</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="defaultSelect" class="form-label">Selección predeterminada</label>
          <select id="defaultSelect" class="form-select">
            <option>Selección predeterminada</option>
            <option value="1">Uno</option>
            <option value="2">Dos</option>
            <option value="3">Tres</option>
          </select>
        </div>
        <div>
          <label for="smallSelect" class="form-label">Selección pequeña</label>
          <select id="smallSelect" class="form-select form-select-sm">
            <option>Selección pequeña</option>
            <option value="1">Uno</option>
            <option value="2">Dos</option>
            <option value="3">Tres</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Casillas de verificación y radios predeterminados y Casillas de verificación y radios predeterminados -->
  <div class="col-xl-6">

    <div class="card mb-6">
      <h5 class="card-header">Casillas de verificación y Radios</h5>
      <!-- Casillas de verificación y Radios -->
      <div class="row row-bordered g-0">
        <div class="col-md p-6">
          <small class="text-light fw-medium">Casillas de verificación</small>
          <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
            <label class="form-check-label" for="defaultCheck1">
              Desmarcado
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" checked />
            <label class="form-check-label" for="defaultCheck2">
              Indeterminado
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" checked />
            <label class="form-check-label" for="defaultCheck3">
              Marcado
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="disabledCheck1" disabled />
            <label class="form-check-label" for="disabledCheck1">
              Desmarcado deshabilitado
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="disabledCheck2" disabled checked />
            <label class="form-check-label" for="disabledCheck2">
              Marcado deshabilitado
            </label>
          </div>
        </div>
        <div class="col-md p-6">
          <small class="text-light fw-medium">Radio</small>
          <div class="form-check mt-4">
            <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1" />
            <label class="form-check-label" for="defaultRadio1">
              Desmarcado
            </label>
          </div>
          <div class="form-check">
            <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio2" checked />
            <label class="form-check-label" for="defaultRadio2">
              Marcado
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="" id="disabledRadio1" disabled />
            <label class="form-check-label" for="disabledRadio1">
              Desmarcado deshabilitado
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="" id="disabledRadio2" disabled checked />
            <label class="form-check-label" for="disabledRadio2">
              Casilla deshabilitada
            </label>
          </div>
        </div>
      </div>
      <hr class="m-0" />
      <!-- Casillas de verificación en línea -->
      <div class="row row-bordered g-0">
        <div class="col-md p-6">
          <small class="text-light fw-medium d-block">Casillas de verificación en línea</small>
          <div class="form-check form-check-inline mt-4">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
            <label class="form-check-label" for="inlineCheckbox1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
            <label class="form-check-label" for="inlineCheckbox2">2</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled />
            <label class="form-check-label" for="inlineCheckbox3">3 (deshabilitado)</label>
          </div>
        </div>
        <div class="col-md p-6">
          <small class="text-light fw-medium d-block">Radio en línea</small>
          <div class="form-check form-check-inline mt-4">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" />
            <label class="form-check-label" for="inlineRadio1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
            <label class="form-check-label" for="inlineRadio2">2</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled />
            <label class="form-check-label" for="inlineRadio3">3 (deshabilitado)</label>
          </div>
        </div>
      </div>
    </div>
    <!-- Interruptores -->
    <div class="card mb-6">
      <h5 class="card-header">Interruptores</h5>
      <div class="card-body">
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault">Entrada de interruptor predeterminado</label>
        </div>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
          <label class="form-check-label" for="flexSwitchCheckChecked">Entrada de interruptor marcado</label>
        </div>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
          <label class="form-check-label" for="flexSwitchCheckDisabled">Entrada de interruptor deshabilitado</label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
          <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Entrada de interruptor marcado deshabilitado</label>
        </div>
      </div>
    </div>

    <!-- Rango -->
    <div class="card mb-6 mb-xl-0">
      <h5 class="card-header">Rango</h5>
      <div class="card-body">
        <div class="mb-4">
          <label for="formRange1" class="form-label">Ejemplo de rango</label>
          <input type="range" class="form-range" id="formRange1">
        </div>
        <div class="mb-4">
          <label for="disabledRange" class="form-label">Rango deshabilitado</label>
          <input type="range" class="form-range" id="disabledRange" disabled>
        </div>
        <div class="mb-4">
          <label for="formRange2" class="form-label">Mínimo y máximo</label>
          <input type="range" class="form-range" min="0" max="5" id="formRange2">
        </div>
        <div>
          <label for="formRange3" class="form-label">Pasos</label>
          <input type="range" class="form-range" min="0" max="5" step="0.5" id="formRange3">
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <!-- Entradas HTML5 -->
    <div class="card mb-6">
      <h5 class="card-header">Entradas HTML5</h5>
      <div class="card-body">
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="text" placeholder="{{ config('variables.templateName') }}" id="html5-text-input" />
          <label for="html5-text-input">Texto</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="search" placeholder="Buscar ..." id="html5-search-input" />
          <label for="html5-search-input">Buscar</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="email" placeholder="john@example.com" id="html5-email-input" />
          <label for="html5-email-input">Correo electrónico</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="url" placeholder="{{ config('variables.templateName') }}" id="html5-url-input" />
          <label for="html5-url-input">URL</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="tel" placeholder="90-(164)-188-556" id="html5-tel-input" />
          <label for="html5-tel-input">Teléfono</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="password" placeholder="contraseña" id="html5-password-input" />
          <label for="html5-password-input">Contraseña</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="number" placeholder="18" id="html5-number-input" />
          <label for="html5-number-input">Número</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="datetime-local" id="html5-datetime-local-input" />
          <label for="html5-datetime-local-input">Fecha y hora</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="date" id="html5-date-input" />
          <label for="html5-date-input">Fecha</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="month" id="html5-month-input" />
          <label for="html5-month-input">Mes</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="week" id="html5-week-input" />
          <label for="html5-week-input">Semana</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="time" id="html5-time-input" />
          <label for="html5-time-input">Hora</label>
        </div>
        <div class="form-floating form-floating-outline mb-6">
          <input class="form-control" type="color" id="html5-color-input" />
          <label for="html5-color-input">Color</label>
        </div>
        <div>
          <label for="html5-range" class="form-label">Rango</label>
          <input type="range" class="form-range mt-4" id="html5-range" />
        </div>
      </div>
    </div>

    <!-- Entrada de archivo -->
    <div class="card">
      <h5 class="card-header">Entrada de archivo</h5>
      <div class="card-body">
        <div class="mb-4">
          <label for="formFile" class="form-label">Ejemplo de entrada de archivo predeterminada</label>
          <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-4">
          <label for="formFileMultiple" class="form-label">Ejemplo de entrada de múltiples archivos</label>
          <input class="form-control" type="file" id="formFileMultiple" multiple>
        </div>
        <div>
          <label for="formFileDisabled" class="form-label">Ejemplo de entrada de archivo deshabilitada</label>
          <input class="form-control" type="file" id="formFileDisabled" disabled>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

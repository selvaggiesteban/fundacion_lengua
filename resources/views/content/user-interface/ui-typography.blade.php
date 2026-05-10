@extends('layouts/contentNavbarLayout')

@section('title', 'Tipografía - Elementos de UI')

@section('content')
<div class="row">
  <!-- Encabezados -->
  <div class="col-lg">
    <div class="card mb-6">
      <h5 class="card-header">Encabezados</h5>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Encabezado 1</small></td>
            <td class="py-4">
              <h1 class="mb-0">Encabezado de Bootstrap</h1>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Encabezado 2</small></td>
            <td class="py-4">
              <h2 class="mb-0">Encabezado de Bootstrap</h2>
            </td>
          </tr>
          <tr>
            <td><small class="text-light fw-medium">Encabezado 3</small></td>
            <td class="py-4">
              <h3 class="mb-0">Encabezado de Bootstrap</h3>
            </td>
          </tr>
          <tr>
            <td><small class="text-light fw-medium">Encabezado 4</small></td>
            <td class="py-4">
              <h4 class="mb-0">Encabezado de Bootstrap</h4>
            </td>
          </tr>
          <tr>
            <td><small class="text-light fw-medium">Encabezado 5</small></td>
            <td class="py-4">
              <h5 class="mb-0">Encabezado de Bootstrap</h5>
            </td>
          </tr>
          <tr>
            <td><small class="text-light fw-medium">Encabezado 6</small></td>
            <td class="py-4">
              <h6 class="mb-0">Encabezado de Bootstrap</h6>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Personalizando encabezados -->
  <div class="col-lg">
    <div class="card mb-6">
      <h5 class="card-header">Personalizando Encabezados <small class="text-muted ms-1">Por Defecto</small></h5>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Encabezado 1</small></td>
            <td class="py-4">
              <h1 class="mb-0">Bootstrap <small class="text-muted">encabezado</small></h1>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Encabezado 2</small></td>
            <td class="py-4">
              <h2 class="mb-0">Bootstrap <small class="text-muted">encabezado</small></h2>
            </td>
          </tr>
          <tr>
            <td><small class="text-light fw-medium">Encabezado 3</small></td>
            <td class="py-4">
              <h3 class="mb-0">Bootstrap <small class="text-muted">encabezado</small></h3>
            </td>
          </tr>
          <tr>
            <td><small class="text-light fw-medium">Encabezado 4</small></td>
            <td class="py-4">
              <h4 class="mb-0">Bootstrap <small class="text-muted">encabezado</small></h4>
            </td>
          </tr>
          <tr>
            <td><small class="text-light fw-medium">Encabezado 5</small></td>
            <td class="py-4">
              <h5 class="mb-0">Bootstrap <small class="text-muted">encabezado</small></h5>
            </td>
          </tr>
          <tr>
            <td><small class="text-light fw-medium">Encabezado 6</small></td>
            <td class="py-4">
              <h6 class="mb-0">Bootstrap <small class="text-muted">encabezado</small></h6>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="row">
  <!-- Encabezados de visualización -->
  <div class="col-lg">
    <div class="card mb-6">
      <h5 class="card-header">Encabezados de visualización</h5>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Visualización 1</small></td>
            <td class="py-4">
              <h1 class="display-1 mb-0">Visualización 1</h1>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Visualización 2</small></td>
            <td class="py-4">
              <h1 class="display-2 mb-0">Visualización 2</h1>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Visualización 3</small></td>
            <td class="py-4">
              <h1 class="display-3 mb-0">Visualización 3</h1>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Visualización 4</small></td>
            <td class="py-4">
              <h1 class="display-4 mb-0">Visualización 4</h1>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Visualización 5</small></td>
            <td class="py-4">
              <h1 class="display-5 mb-0">Visualización 5</h1>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Visualización 6</small></td>
            <td class="py-4">
              <h1 class="display-6 mb-0">Visualización 6</h1>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Párrafo -->
  <div class="col-lg">
    <div class="card mb-6">
      <h5 class="card-header">Párrafo</h5>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Párrafo</small></td>
            <td class="py-4">
              <p class="mb-0">
                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo
                luctus.
                Duis mollis, est non commodo luctus.Duis mollis, est non commodo luctus.
              </p>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Texto principal</small></td>
            <td class="py-6">
              <p class="lead mb-0">
                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo
                luctus.Duis mollis, est non commodo luctus.
              </p>
            </td>
          </tr>
          <tr>
            <td class="align-middle"><small class="text-light fw-medium">Texto silenciado</small></td>
            <td class="py-4">
              <p class="text-muted mb-0">
                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo
                luctus.
              </p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="row">
  <!-- Elementos de texto en línea -->
  <div class="col">
    <div class="card mb-6">
      <h5 class="card-header">Elementos de texto en línea</h5>
      <div class="card-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <td class="align-middle"><small class="text-light fw-medium">Resaltado de texto</small></td>
              <td class="py-4">
                <p class="mb-0">Puede usar la etiqueta mark para <mark>resaltar</mark> texto.</p>
              </td>
            </tr>
            <tr>
              <td class="align-middle"><small class="text-light fw-medium">Texto eliminado</small></td>
              <td class="py-4">
                <p class="mb-0"><del>Esta línea de texto se trata como texto eliminado.</del></p>
              </td>
            </tr>
            <tr>
              <td><small class="text-light fw-medium">No más correcto</small></td>
              <td class="py-4">
                <p class="mb-0">Esta línea de texto se trata como no más exacta.
              </p>
              </td>
            </tr>
            <tr>
              <td><small class="text-light fw-medium">Añadido</small></td>
              <td class="py-4">
                <p class="mb-0"><ins>Esta línea de texto se trata como una adición al documento.</ins></p>
              </td>
            </tr>
            <tr>
              <td><small class="text-light fw-medium">Subrayado</small></td>
              <td class="py-4">
                <p class="mb-0"><u>Esta línea de texto se renderizará como subrayado</u></p>
              </td>
            </tr>
            <tr>
              <td><small class="text-light fw-medium">Texto pequeño</small></td>
              <td class="py-4">
                <p class="mb-0"><small>Esta línea de texto se trata como texto pequeño.</small></p>
              </td>
            </tr>
            <tr>
              <td><small class="text-light fw-medium">Texto en negrita</small></td>
              <td class="py-4">
                <p class="mb-0"><strong>Esta línea se renderizó como texto en negrita.</strong></p>
              </td>
            </tr>
            <tr>
              <td><small class="text-light fw-medium">Texto en cursiva</small></td>
              <td class="py-4">
                <p class="mb-0"><em>Esta línea se renderizó como texto en cursiva.</em></p>
              </td>
            </tr>
            <tr>
              <td><small class="text-light fw-medium">Abreviaciones</small></td>
              <td>
                <p><abbr title="atributo">attr</abbr></p>
                <p class="mb-0"><abbr title="Lenguaje de Marcado Hipertexto" class="initialism">HTML</abbr></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Blockquote -->
  <div class="col-lg">
    <div class="card mb-6 mb-lg-0">
      <h5 class="card-header">Blockquote</h5>
      <div class="card-body">
        <blockquote class="blockquote mt-4">
          <p class="mb-0">Una cita conocida, contenida en un elemento blockquote.</p>
        </blockquote>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Nombrar una fuente</small>
        <figure class="mt-2">
          <blockquote class="blockquote">
            <p class="mb-0">Una cita conocida, contenida en un elemento blockquote.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Alguien famoso en <cite title="Fuente de título">Fuente de título</cite>
          </figcaption>
        </figure>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Alinear al Centro</small>
        <figure class="text-center mt-2">
          <blockquote class="blockquote">
            <p class="mb-0">Una cita conocida, contenida en un elemento blockquote.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Alguien famoso en <cite title="Fuente de título">Fuente de título</cite>
          </figcaption>
        </figure>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Alinear a la Derecha</small>
        <figure class="text-end mt-2">
          <blockquote class="blockquote">
            <p class="mb-0">Una cita conocida, contenida en un elemento blockquote.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Alguien famoso en <cite title="Fuente de título">Fuente de título</cite>
          </figcaption>
        </figure>
      </div>

    </div>
  </div>
  <div class="col-lg">
    <div class="card">
      <h5 class="card-header">Listas</h5>
      <div class="card-body">
        <small class="text-light fw-medium">Sin estilo</small>
        <ul class="list-unstyled mt-2">
          <li>Este es un elemento de lista sin estilo</li>
          <li>Aquí va otro elemento de lista</li>
          <li>
            Un tercer elemento de lista
            <ul>
              <li>Primer sub-elemento</li>
              <li>Segundo sub-elemento</li>
            </ul>
          </li>
          <li>Un cuarto elemento de lista</li>
        </ul>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">En línea</small>
        <ul class="list-inline mt-2">
          <li class="list-inline-item">Elemento uno</li>
          <li class="list-inline-item">Elemento dos</li>
          <li class="list-inline-item">Elemento tres</li>
        </ul>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <small class="text-light fw-medium">Alineación de lista de descripción</small>
        <dl class="row mt-2">
          <dt class="col-sm-3">Listas de descripción</dt>
          <dd class="col-sm-9">Una lista de descripción es perfecta para definir términos.</dd>

          <dt class="col-sm-3">Término de ejemplo</dt>
          <dd class="col-sm-9">
            <p>Este es un texto de ejemplo para la descripción de un término. Puede ser reemplazado por cualquier información relevante.</p>
          </dd>

          <dt class="col-sm-3">Puerta de malesuada</dt>
          <dd class="col-sm-9">Este es otro texto de ejemplo para la descripción de un término.</dd>

          <dt class="col-sm-3 text-truncate">El término truncado está truncado</dt>
          <dd class="col-sm-9">
            Este es un texto de ejemplo más largo para la descripción de un término. Contiene más detalles para fines de demostración.
          </dd>

          <dt class="col-sm-3">Anidamiento</dt>
          <dd class="col-sm-9">
            <dl class="row">
              <dt class="col-sm-4">Lista de definición anidada</dt>
              <dd class="col-sm-8">Este es un ejemplo de una lista de definición anidada, con más texto explicativo para el término.</dd>
            </dl>
          </dd>
        </dl>
      </div>
    </div>
  </div>
</div>
@endsection

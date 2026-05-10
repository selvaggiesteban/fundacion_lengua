@extends('layouts/contentNavbarLayout')

@section('title', 'Modales - Elementos de UI')

@section('page-script')
  @vite(['resources/assets/js/ui-modals.js'])
@endsection

@section('content')
<!-- Modales de Bootstrap -->
<div class="card mb-6">
  <h5 class="card-header">Modales de Bootstrap</h5>
  <div class="card-body">
    <div class="row gy-3">
      <!-- Modal Predeterminado -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium">Predeterminado</small>
        <div class="mt-4">
          <!-- Botón para abrir modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Abrir modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Título del modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-6 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameBasic" class="form-control" placeholder="Ingresar Nombre">
                        <label for="nameBasic">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row g-4">
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
                        <label for="emailBasic">Correo electrónico</label>
                      </div>
                    </div>
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="date" id="dobBasic" class="form-control">
                        <label for="dobBasic">Fecha de Nacimiento</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Centrado Verticalmente -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium">Centrado verticalmente</small>
        <div class="mt-4">
          <!-- Botón para abrir modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Abrir modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Título del modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-6 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" placeholder="Ingresar Nombre">
                        <label for="nameWithTitle">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row g-4">
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
                        <label for="emailWithTitle">Correo electrónico</label>
                      </div>
                    </div>
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="date" id="dobWithTitle" class="form-control">
                        <label for="dobWithTitle">Fecha de Nacimiento</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Deslizar desde arriba -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium">Deslizar desde arriba</small>
        <div class="mt-4">
          <!-- Botón para abrir modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop">
            Abrir modal
          </button>

          <!-- Modal -->
          <div class="modal modal-top fade" id="modalTop" tabindex="-1">
            <div class="modal-dialog">
              <form class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTopTitle">Título del modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-6 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameSlideTop" class="form-control" placeholder="Ingresar Nombre">
                        <label for="nameSlideTop">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row g-4">
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="emailSlideTop" class="form-control" placeholder="xxxx@xxx.xx">
                        <label for="emailSlideTop">Correo electrónico</label>
                      </div>
                    </div>
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="date" id="dobSlideTop" class="form-control">
                        <label for="dobSlideTop">Fecha de Nacimiento</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="m-0">
  <div class="card-body">
    <div class="row gy-3">
      <!-- Modal con Video de YouTube -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium">Video de YouTube</small>
        <div class="mt-4">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#youTubeModal" data-theVideo="https://www.youtube.com/embed/EngW7tLk6R8">
            Abrir modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="youTubeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <iframe height="350" src="https://www.youtube.com/embed/EngW7tLk6R8"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Alternar entre modales -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium">Alternar entre modales</small>
        <div class="mt-4">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalToggle">
            Abrir modal
          </button>

          <!-- Modal 1-->
          <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalToggleLabel">Modal 1</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  Mostrar un segundo modal y ocultar este con el botón de abajo.
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Abrir segundo modal</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal 2-->
          <div class="modal fade" id="modalToggle2" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalToggleLabel2">Modal 2</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  Ocultar este modal y mostrar el primero con el botón de abajo.
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-target="#modalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Volver al primero</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal a pantalla completa -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium">Pantalla completa</small>
        <div class="mt-4">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
            Abrir modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalFullTitle">Título del modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <p>Este es un texto de ejemplo para el contenido de un modal a pantalla completa. Puede contener cualquier tipo de información, ya sean párrafos, listas o cualquier otro elemento HTML necesario para la visualización del contenido.</p>
                  <p>Se utiliza para demostrar el comportamiento del modal y cómo se adapta a diferentes tamaños de pantalla. La idea es proporcionar un espacio amplio para la información que requiera mayor atención del usuario.</p>
                  <p>Asegúrate de que el contenido sea relevante y fácil de leer. El diseño del modal busca una experiencia de usuario fluida y sin distracciones, permitiendo al usuario concentrarse en la información presentada.</p>
                  <p>Este texto se puede reemplazar con contenido real según las necesidades del proyecto.</p>
                  <p>La flexibilidad del modal permite integrar diferentes tipos de medios, como imágenes o videos, para enriquecer la presentación. Su objetivo es mejorar la interacción del usuario con la interfaz.</p>
                  <p>La implementación de este componente garantiza una presentación moderna y accesible para todo tipo de dispositivos, desde móviles hasta pantallas de escritorio de gran tamaño.</p>
                  <p>Las modales son herramientas versátiles en el diseño de interfaces de usuario. Permiten presentar información crítica o solicitar entradas de datos sin redirigir al usuario a una nueva página.</p>
                  <p>La clave para un buen modal es su usabilidad: debe ser fácil de abrir, fácil de cerrar y debe comunicar claramente su propósito al usuario.</p>
                  <p>Es importante considerar la accesibilidad al diseñar modales, asegurándose de que sean navegables con el teclado y compatibles con lectores de pantalla.</p>
                  <p>El uso de animaciones sutiles puede mejorar la experiencia del usuario, haciendo que la transición al modal sea más suave y agradable.</p>
                  <p>Este texto de relleno simula un contenido largo para demostrar el comportamiento de desplazamiento dentro del modal.</p>
                  <p>Recuerda que la personalización es fundamental. Adapta el estilo y la funcionalidad del modal a la identidad visual de tu aplicación.</p>
                  <p>La integración con marcos de trabajo como Bootstrap facilita la creación de modales responsivos y estéticamente atractivos.</p>
                  <p>En resumen, los modales son una forma efectiva de presentar información o interactuar con el usuario de manera contextual.</p>
                  <p>Esperamos que este ejemplo te sea útil para tus proyectos.</p>
                  <p>Puedes personalizar este contenido y añadir más párrafos o elementos según tus necesidades específicas.</p>
                  <p>La implementación es sencilla y se adapta a diferentes escenarios de uso, desde formularios de inicio de sesión hasta notificaciones importantes.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="m-0">
  <div class="card-body">
    <div class="row gy-3">
      <!-- Tamaños de Modal -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-medium">Tamaños</small>
        <!-- Modal Pequeño -->
        <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Título del modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-6 mt-2">
                    <div class="form-floating form-floating-outline">
                      <input type="text" id="nameSmall" class="form-control" placeholder="Ingresar Nombre">
                      <label for="nameSmall">Nombre</label>
                    </div>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col mb-2">
                    <div class="form-floating form-floating-outline">
                      <input type="email" class="form-control" id="emailSmall" placeholder="xxxx@xxx.xx">
                      <label for="emailSmall">Correo electrónico</label>
                    </div>
                  </div>
                  <div class="col mb-2">
                    <div class="form-floating form-floating-outline">
                      <input id="dobSmall" type="date" class="form-control">
                      <label for="dobSmall">Fecha de Nacimiento</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Grande -->
        <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Título del modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-6 mt-2">
                    <div class="form-floating form-floating-outline">
                      <input type="text" id="nameLarge" class="form-control" placeholder="Ingresar Nombre">
                      <label for="nameLarge">Nombre</label>
                    </div>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col mb-2">
                    <div class="form-floating form-floating-outline">
                      <input type="email" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx">
                      <label for="emailLarge">Correo electrónico</label>
                    </div>
                  </div>
                  <div class="col mb-2">
                    <div class="form-floating form-floating-outline">
                      <input type="date" id="dobLarge" class="form-control">
                      <label for="dobLarge">Fecha de Nacimiento</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Extra Grande -->
        <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Título del modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-6 mt-2">
                    <div class="form-floating form-floating-outline">
                      <input type="text" id="nameExLarge" class="form-control" placeholder="Ingresar Nombre">
                      <label for="nameExLarge">Nombre</label>
                    </div>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col mb-2">
                    <div class="form-floating form-floating-outline">
                      <input type="email" id="emailExLarge" class="form-control" placeholder="xxxx@xxx.xx">
                      <label for="emailExLarge">Correo electrónico</label>
                    </div>
                  </div>
                  <div class="col mb-2">
                    <div class="form-floating form-floating-outline">
                      <input type="date" id="dobExLarge" class="form-control">
                      <label for="dobExLarge">Fecha de Nacimiento</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
            Pequeño
          </button>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
            Grande
          </button>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
            Extra Grande
          </button>
        </div>
      </div>

      <!-- Contenido largo con desplazamiento del modal -->
      <div class="col-lg-4 col-md-3">
        <small class="text-light fw-medium">Contenido largo con desplazamiento</small>
        <!-- Modal -->
        <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLongTitle">Título del modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                <p>Este es un texto de ejemplo para el contenido de un modal con desplazamiento. Puede contener cualquier tipo de información, ya sean párrafos, listas o cualquier otro elemento HTML necesario para la visualización del contenido. Este es un texto de relleno para fines de demostración.</p>
                <p>Se utiliza para demostrar el comportamiento del modal y cómo se adapta a diferentes tamaños de pantalla. La idea es proporcionar un espacio amplio para la información que requiera mayor atención del usuario.</p>
                <p>Asegúrate de que el contenido sea relevante y fácil de leer. El diseño del modal busca una experiencia de usuario fluida y sin distracciones, permitiendo al usuario concentrarse en la información presentada.</p>
                <p>Este texto se puede reemplazar con contenido real según las necesidades del proyecto.</p>
                <p>La flexibilidad del modal permite integrar diferentes tipos de medios, como imágenes o videos, para enriquecer la presentación. Su objetivo es mejorar la interacción del usuario con la interfaz.</p>
                <p>La implementación de este componente garantiza una presentación moderna y accesible para todo tipo de dispositivos, desde móviles hasta pantallas de escritorio de gran tamaño.</p>
                <p>Las modales son herramientas versátiles en el diseño de interfaces de usuario. Permiten presentar información crítica o solicitar entradas de datos sin redirigir al usuario a una nueva página.</p>
                <p>La clave para un buen modal es su usabilidad: debe ser fácil de abrir, fácil de cerrar y debe comunicar claramente su propósito al usuario.</p>
                <p>Es importante considerar la accesibilidad al diseñar modales, asegurándose de que sean navegables con el teclado y compatibles con lectores de pantalla.</p>
                <p>El uso de animaciones sutiles puede mejorar la experiencia del usuario, haciendo que la transición al modal sea más suave y agradable.</p>
                <p>Este texto de relleno simula un contenido largo para demostrar el comportamiento de desplazamiento dentro del modal.</p>
                <p>Recuerda que la personalización es fundamental. Adapta el estilo y la funcionalidad del modal a la identidad visual de tu aplicación.</p>
                <p>La integración con marcos de trabajo como Bootstrap facilita la creación de modales responsivos y estéticamente atractivos.</p>
                <p>En resumen, los modales son una forma efectiva de presentar información o interactuar con el usuario de manera contextual.</p>
                <p>Esperamos que este ejemplo te sea útil para tus proyectos.</p>
                <p>Puedes personalizar este contenido y añadir más párrafos o elementos según tus necesidades específicas.</p>
                <p>La implementación es sencilla y se adapta a diferentes escenarios de uso, desde formularios de inicio de sesión hasta notificaciones importantes.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">Título del modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                <p>Este es un texto de ejemplo para el contenido de un modal con desplazamiento. Puede contener cualquier tipo de información, ya sean párrafos, listas o cualquier otro elemento HTML necesario para la visualización del contenido. Este es un texto de relleno para fines de demostración.</p>
                <p>Se utiliza para demostrar el comportamiento del modal y cómo se adapta a diferentes tamaños de pantalla. La idea es proporcionar un espacio amplio para la información que requiera mayor atención del usuario.</p>
                <p>Asegúrate de que el contenido sea relevante y fácil de leer. El diseño del modal busca una experiencia de usuario fluida y sin distracciones, permitiendo al usuario concentrarse en la información presentada.</p>
                <p>Este texto se puede reemplazar con contenido real según las necesidades del proyecto.</p>
                <p>La flexibilidad del modal permite integrar diferentes tipos de medios, como imágenes o videos, para enriquecer la presentación. Su objetivo es mejorar la interacción del usuario con la interfaz.</p>
                <p>La implementación de este componente garantiza una presentación moderna y accesible para todo tipo de dispositivos, desde móviles hasta pantallas de escritorio de gran tamaño.</p>
                <p>Las modales son herramientas versátiles en el diseño de interfaces de usuario. Permiten presentar información crítica o solicitar entradas de datos sin redirigir al usuario a una nueva página.</p>
                <p>La clave para un buen modal es su usabilidad: debe ser fácil de abrir, fácil de cerrar y debe comunicar claramente su propósito al usuario.</p>
                <p>Es importante considerar la accesibilidad al diseñar modales, asegurándose de que sean navegables con el teclado y compatibles con lectores de pantalla.</p>
                <p>El uso de animaciones sutiles puede mejorar la experiencia del usuario, haciendo que la transición al modal sea más suave y agradable.</p>
                <p>Este texto de relleno simula un contenido largo para demostrar el comportamiento de desplazamiento dentro del modal.</p>
                <p>Recuerda que la personalización es fundamental. Adapta el estilo y la funcionalidad del modal a la identidad visual de tu aplicación.</p>
                <p>La integración con marcos de trabajo como Bootstrap facilita la creación de modales responsivos y estéticamente atractivos.</p>
                <p>En resumen, los modales son una forma efectiva de presentar información o interactuar con el usuario de manera contextual.</p>
                <p>Esperamos que este ejemplo te sea útil para tus proyectos.</p>
                <p>Puedes personalizar este contenido y añadir más párrafos o elementos según tus necesidades específicas.</p>
                <p>La implementación es sencilla y se adapta a diferentes escenarios de uso, desde formularios de inicio de sesión hasta notificaciones importantes.</p>
              </div>
              <div class="modal-footer mt-1">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>
        <div class="demo-inline-spacing">
          <!-- Botón para abrir modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLong">
            Opción 1
          </button>

          <!-- Botón ModalScrollable -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalScrollable">
            Opción 2
          </button>
        </div>
      </div>

      <!-- Fondo de modal -->
      <div class="col-lg-4 col-md-3">
        <small class="text-light fw-medium">Fondo</small>
        <div class="mt-4">
          <!-- Botón para abrir modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
            Abrir modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
              <form class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="backDropModalTitle">Título del modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-6 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameBackdrop" class="form-control" placeholder="Ingresar Nombre">
                        <label for="nameBackdrop">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row g-4">
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="emailBackdrop" class="form-control" placeholder="xxxx@xxx.xx">
                        <label for="emailBackdrop">Correo electrónico</label>
                      </div>
                    </div>
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="date" id="dobBackdrop" class="form-control">
                        <label for="dobBackdrop">Fecha de Nacimiento</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Modales de Bootstrap -->
@endsection

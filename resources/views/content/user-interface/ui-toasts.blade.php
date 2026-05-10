@extends('layouts/contentNavbarLayout')

@section('title', 'Notificaciones (Toasts) - Elementos de UI')

@section('page-script')
  @vite(['resources/assets/js/ui-toasts.js'])
@endsection

@section('content')

<!-- Notificación (Toast) con Ubicaciones -->
<div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
  <div class="toast-header">
    <i class="ri-home-4-fill me-2"></i>
    <div class="me-auto fw-medium">Bootstrap</div>
    <small class="text-muted">hace 11 minutos</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
  </div>
  <div class="toast-body">
    ¡Hola, mundo! Este es un mensaje de notificación.
  </div>
</div>
<!-- Notificación (Toast) con Ubicaciones -->

<!-- Ejemplo de Notificaciones (Toasts) de Bootstrap con Ubicación -->
<div class="card mb-6">
  <h5 class="card-header">Ejemplo de Notificaciones (Toasts) de Bootstrap con Ubicación</h5>
  <div class="card-body">
    <div class="row gx-3 gy-2 align-items-end gap-4 gap-md-0">
      <div class="col-md-3">
        <label for="selectTypeOpt" class="form-label">Tipo</label>
        <select id="selectTypeOpt" class="form-select form-select-sm color-dropdown">
          <option value="text-primary" selected>Primario</option>
          <option value="text-secondary">Secundario</option>
          <option value="text-success">Éxito</option>
          <option value="text-danger">Peligro</option>
          <option value="text-warning">Advertencia</option>
          <option value="text-info">Información</option>
          <option value="text-dark">Oscuro</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="selectPlacement" class="form-label">Ubicación</label>
        <select class="form-select form-select-sm placement-dropdown" id="selectPlacement">
          <option value="top-0 start-0">Arriba a la izquierda</option>
          <option value="top-0 start-50 translate-middle-x">Arriba al centro</option>
          <option value="top-0 end-0">Arriba a la derecha</option>
          <option value="top-50 start-0 translate-middle-y">Centro a la izquierda</option>
          <option value="top-50 start-50 translate-middle">Centro</option>
          <option value="top-50 end-0 translate-middle-y">Centro a la derecha</option>
          <option value="bottom-0 start-0">Abajo a la izquierda</option>
          <option value="bottom-0 start-50 translate-middle-x">Abajo al centro</option>
          <option value="bottom-0 end-0">Abajo a la derecha</option>
        </select>
      </div>
      <div class="col-md-3">
        <button id="showToastPlacement" class="btn btn-primary d-block">Mostrar Notificación</button>
      </div>
    </div>
  </div>
</div>
<!--/ Ejemplo de Notificaciones (Toasts) de Bootstrap con Ubicación -->

<!-- Estilos de Notificaciones (Toasts) de Bootstrap -->
<div class="card mb-6">
  <h5 class="card-header">Estilos de Notificaciones (Toasts) de Bootstrap</h5>
  <div class="row g-0">
    <div class="col-md-6 p-6">
      <div class="text-light small fw-medium">Predeterminado</div>
      <div class="toast-container position-relative">

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-home-4-fill me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-bootstrap-fill text-primary me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-spam-fill text-secondary me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-checkbox-circle-fill text-success me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-error-warning-fill text-danger me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-alert-fill text-warning me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-information-fill text-info me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-contrast-fill text-dark me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 ui-bg-overlay-container p-6">
      <div class="ui-bg-overlay bg-dark rounded-end-bottom"></div>
      <div class="text-white small fw-medium mb-4">Translúcido</div>

      <div class="toast-container position-relative">
        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-home-4-fill me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-bootstrap-fill text-primary me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-spam-fill text-secondary me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-checkbox-circle-fill text-success me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-error-warning-fill text-danger me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-alert-fill text-warning me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-information-fill text-info me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>

        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="ri-contrast-fill text-dark me-2"></i>
            <div class="me-auto fw-medium">Bootstrap</div>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
          </div>
          <div class="toast-body">
            ¡Hola, mundo! Este es un mensaje de notificación.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Estilos de Notificaciones (Toasts) de Bootstrap -->
@endsection

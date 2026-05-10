@extends('layouts/contentNavbarLayout')

@section('title', 'Configuración de la cuenta - Páginas')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="nav-align-top">
      <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-account')}}"><i class="ri-group-line me-1_5"></i> Cuenta</a></li>
        <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ri-notification-4-line me-1_5"></i> Notificaciones</a></li>
      </ul>
    </div>
    <div class="card">
      <!-- Notifications -->
      <div class="card-body">
        <h5 class="mb-0">Dispositivos Recientes</h5>
        <span class="card-subtitle">Necesitamos permiso de tu navegador para mostrar notificaciones. <a href="javascript:void(0);" class="notificationRequest">Solicitar Permiso</a></span>
        <div class="error"></div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-nowrap fw-medium">Hora</th>
              <th class="text-nowrap fw-medium text-center">Correo Electrónico</th>
              <th class="text-nowrap fw-medium text-center">Navegador</th>
              <th class="text-nowrap fw-medium text-center">Aplicación</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap text-heading">Novedades para ti</td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                </div>
              </td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck2" checked />
                </div>
              </td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck3" checked />
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap text-heading">Actividad de la cuenta</td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                </div>
              </td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                </div>
              </td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap text-heading">Se ha usado un nuevo navegador para iniciar sesión</td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                </div>
              </td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                </div>
              </td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck9" />
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap text-heading">Se ha vinculado un nuevo dispositivo</td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                </div>
              </td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck11" />
                </div>
              </td>
              <td>
                <div class="form-check mb-0 d-flex justify-content-center mb-0">
                  <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-body">
        <p class="mb-6 fw-medium">¿Cuándo debemos enviarte notificaciones?</p>
        <form action="javascript:void(0);">
          <div class="row">
            <div class="col-sm-6">
              <select id="sendNotification" class="form-select" name="sendNotification">
                <option>Solo cuando esté en línea</option>
                <option>En cualquier momento</option>
              </select>
            </div>
            <div class="mt-6">
              <button type="submit" class="btn btn-primary me-3">Guardar cambios</button>
              <button type="reset" class="btn btn-outline-secondary">Restablecer</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /Notifications -->
    </div>
  </div>
</div>
@endsection

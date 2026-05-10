@extends('layouts/contentNavbarLayout')

@section('title', 'Pie de página - Elementos de UI')

@section('content')
<!-- Pie de página Básico -->
<section id="basic-footer">
  <h5 class="pb-1 mb-6">Pie de página Básico</h5>

  <footer class="footer bg-lighter">
    <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
      <div>
        <a href="{{ config('variables.livePreview') }}" target="_blank" class="footer-text fw-bold">{{config('variables.templateName')}}</a> ©
      </div>
      <div class="d-flex flex-column flex-sm-row">
        <a href="{{ config('variables.licenseUrl') }}" class="footer-link me-6" target="_blank">Licencia</a>
        <a href="javascript:void(0)" class="footer-link me-6">Ayuda</a>
        <a href="javascript:void(0)" class="footer-link me-6">Contacto</a>
        <a href="javascript:void(0)" class="footer-link">Términos y Condiciones</a>
      </div>
    </div>
  </footer>
</section>
<!--/ Pie de página Básico -->
<hr class="container-m-nx border-light my-12" />

<!-- Pie de página con componentes -->
<section id="component-footer">
  <h5 class="pb-1 mb-6">Pie de página con Elementos</h5>

  <footer class="footer bg-lighter">
    <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
      <div>
        <a href="{{ config('variables.livePreview') }}" target="_blank" class="footer-text fw-bold">{{config('variables.templateName')}}</a> ©
      </div>
      <div class="d-flex flex-column flex-sm-row gap-4">
        <div class="form-check footer-link mb-0 mt-1">
          <input class="form-check-input" type="checkbox" value="" id="customCheck2" checked />
          <label class="form-check-label" for="customCheck2">
            Mostrar
          </label>
        </div>
        <div class="dropdown dropup footer-link">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Moneda
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="javascript:void(0);"><i class='ri-money-dollar-circle-line me-2'></i>USD</a>
            <a class="dropdown-item" href="javascript:void(0);"><i class='ri-money-euro-circle-line me-2'></i>Euro</a>
            <a class="dropdown-item" href="javascript:void(0);"><i class='ri-money-pound-circle-line me-2'></i>Libra</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0);"><i class='ri-btc-line me-2'></i>Bitcoin</a>
          </div>
        </div>
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger"><i class='ri-logout-box-r-line me-1'></i>Cerrar sesión</a>
      </div>
    </div>
  </footer>
</section>
<!--/ Pie de página con componentes -->
@endsection

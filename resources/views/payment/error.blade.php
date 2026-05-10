@extends('layouts.blankLayout')

@section('title', 'Error en el Pago')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Error card -->
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{ url('/') }}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logos/logo  fundacion de la lengua española.png') }}" alt="Fundación de la Lengua Española" style="height: 40px;">
              </span>
            </a>
          </div>
          <!-- /Logo -->
          
          <div class="text-center mb-6">
            <div class="mb-4">
              <i class="ri-error-warning-line text-danger" style="font-size: 4rem;"></i>
            </div>
            <h4 class="mb-1 text-danger">Error en el Pago</h4>
            <p class="mb-6">Ha ocurrido un problema al procesar su pago.</p>
          </div>

          <div class="text-center">
            <div class="alert alert-danger" role="alert">
              <h6 class="alert-heading">Pago no procesado</h6>
              <hr>
              <p class="mb-2">Su pago no pudo ser completado.</p>
              <p class="mb-2">Esto puede deberse a:</p>
              <ul class="text-start mb-2">
                <li>Datos de tarjeta incorrectos</li>
                <li>Fondos insuficientes</li>
                <li>Problemas de conexión</li>
                <li>Transacción cancelada</li>
              </ul>
              <p class="mb-0">Su pedido permanece guardado y puede intentar pagar nuevamente.</p>
            </div>

            @if(session('error'))
              <div class="alert alert-warning mt-4" role="alert">
                {{ session('error') }}
              </div>
            @endif

            <div class="mt-6">
              <a href="javascript:history.back()" class="btn btn-primary me-3">
                <i class="ri-arrow-left-line me-2"></i>
                Intentar de Nuevo
              </a>
              <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                <i class="ri-home-line me-2"></i>
                Volver al Inicio
              </a>
            </div>

            <div class="mt-4">
              <p class="text-muted small">
                Si el problema persiste, contacte con nosotros:<br>
                <strong>Email:</strong> info@fundacionlengua.es<br>
                <strong>Teléfono:</strong> +34 XXX XXX XXX
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- /Error card -->
    </div>
  </div>
</div>
@endsection
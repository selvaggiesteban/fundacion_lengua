@extends('layouts.blankLayout')

@section('title', 'Pago Exitoso')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Success card -->
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
              <i class="ri-check-double-line text-success" style="font-size: 4rem;"></i>
            </div>
            <h4 class="mb-1 text-success">¡Pago Exitoso!</h4>
            <p class="mb-6">Su pago ha sido procesado correctamente y su inscripción está confirmada.</p>
          </div>

          <div class="text-center">
            <div class="alert alert-success" role="alert">
              <h6 class="alert-heading">¡Felicitaciones!</h6>
              <hr>
              <p class="mb-2">Su pago ha sido procesado con éxito.</p>
              <p class="mb-2">Se ha creado automáticamente su cuenta de estudiante.</p>
              <p class="mb-0">{{ __('messages.email_success_message') }}</p>
            </div>

            @if(session('message'))
              <div class="alert alert-info mt-4" role="alert">
                {{ session('message') }}
              </div>
            @endif

            <div class="mt-6">
              <a href="{{ route('login') }}" class="btn btn-primary me-3">
                <i class="ri-login-box-line me-2"></i>
                Iniciar Sesión
              </a>
              <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                <i class="ri-home-line me-2"></i>
                Volver al Inicio
              </a>
            </div>

            <div class="mt-4">
              <p class="text-muted small">
                Si tiene alguna pregunta, no dude en contactarnos.<br>
                <strong>Email:</strong> info@fundacionlengua.es<br>
                <strong>Teléfono:</strong> +34 XXX XXX XXX
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- /Success card -->
    </div>
  </div>
</div>
@endsection
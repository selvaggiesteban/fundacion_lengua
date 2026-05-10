@extends('layouts.blankLayout')

@section('title', 'Procesando Pago')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Payment redirect card -->
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
            <h4 class="mb-1">Procesando Pago</h4>
            <p class="mb-6">Redirigiendo a la pasarela de pago segura...</p>
          </div>

          <div class="text-center">
            <div class="spinner-border text-primary mb-4" role="status">
              <span class="visually-hidden">Cargando...</span>
            </div>
            
            <div class="alert alert-info" role="alert">
              <h6 class="alert-heading">Información del pedido:</h6>
              <hr>
              <p class="mb-1"><strong>Número:</strong> {{ $order->order_number }}</p>
              <p class="mb-1"><strong>Curso:</strong> {{ $order->course_type }}</p>
              <p class="mb-1"><strong>Semanas:</strong> {{ $order->weeks }}</p>
              <p class="mb-0"><strong>Total:</strong> €{{ number_format($order->total_amount, 2) }}</p>
            </div>

            <form id="payment-form" action="{{ $params['action_url'] }}" method="POST" style="display: none;">
              <input type="hidden" name="Ds_SignatureVersion" value="{{ $params['Ds_SignatureVersion'] }}">
              <input type="hidden" name="Ds_MerchantParameters" value="{{ $params['Ds_MerchantParameters'] }}">
              <input type="hidden" name="Ds_Signature" value="{{ $params['Ds_Signature'] }}">
            </form>

            <p class="text-muted small mt-4">
              Será redirigido automáticamente en unos segundos.<br>
              Si no es así, <a href="#" onclick="document.getElementById('payment-form').submit();">haga clic aquí</a>.
            </p>
          </div>
        </div>
      </div>
      <!-- /Payment redirect card -->
    </div>
  </div>
</div>

<script>
  // Auto-submit form after 3 seconds
  setTimeout(function() {
    document.getElementById('payment-form').submit();
  }, 3000);
</script>
@endsection
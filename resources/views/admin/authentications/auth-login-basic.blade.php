@extends('layouts/blankLayout')

@section('title', 'Iniciar sesión')

@section('page-style')
@vite([
  'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-6 mx-4">

      <div class="card p-7">
        <div class="app-brand justify-content-center mt-5">
          <a href="{{url('/')}}" class="app-brand-link gap-3">
            <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20,"withbg"=>'fill: #fff;'])</span>
            </a>
        </div>
        <div class="card-body mt-1">
          <h4 class="mb-1">Bienvenid@! 👋🏻</h4>
          <p class="mb-5">Por favor inicia sesión en tu cuenta</p>

          {{-- Mostrar errores de validación o de autenticación --}}
          @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          {{-- Mostrar mensajes informativos --}}
          @if (session('info'))
            <div class="alert alert-info mb-3">
                {{ session('info') }}
            </div>
          @endif

          @if (session('error'))
            <div class="alert alert-danger mb-3">
                {{ session('error') }}
            </div>
          @endif

          <form id="formAuthentication" class="mb-5" action="{{ route('login') }}" method="POST">
            @csrf {{-- IMPORTANTE: Token CSRF --}}
            <div class="form-floating form-floating-outline mb-5">
              {{-- Campo de login que acepta email o ID de estudiante --}}
              <input type="text" class="form-control" id="login" name="login" placeholder="Ingresa tu email o ID de estudiante" value="{{ old('login') }}" autofocus>
              <label for="login">Email o ID de Estudiante</label>
            </div>
            <div class="mb-5">
              <div class="form-password-toggle">
                <div class="input-group input-group-merge">
                  <div class="form-floating form-floating-outline">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <label for="password">Contraseña</label>
                  </div>
                  <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
                </div>
              </div>
            </div>
            <div class="mb-5 pb-2 d-flex row" style="margin-left: 5px;">
              <div class="form-check mb-0">
                {{-- CAMBIO: name="remember" --}}
                <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                <label class="form-check-label" for="remember-me">
                  Recordarme
                </label>
              </div>
              <a href="{{url('auth/forgot-password-basic')}}" class="float-end mb-1">
                <span>Olvidaste tu contraseña?</span>
              </a>
            </div>
            <div class="mb-5">
              <button class="btn btn-primary d-grid w-100" type="submit">Iniciar sesión</button>
            </div>
          </form>

          <p class="text-center mb-5 text-muted">
            <small>Los estudiantes reciben sus credenciales por email después del pago</small>
          </p>
        </div>
      </div>
      </div>
  </div>
</div>
@endsection
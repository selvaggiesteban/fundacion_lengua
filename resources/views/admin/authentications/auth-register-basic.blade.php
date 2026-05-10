@extends('layouts/blankLayout')

@section('title', 'Registrarse')

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
            <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
            </a>
        </div>
        <div class="card-body mt-1">
          <h4 class="mb-1">Regístrate 🚀</h4>
          <p class="mb-5">Ingresa tus datos</p>

          {{-- Para mostrar errores de validación --}}
          @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form id="formAuthentication" class="mb-5" action="{{ url('/register') }}" method="POST"> {{-- O usa route('tu.ruta.post.registro') --}}
            @csrf {{-- Token CSRF --}}

            {{-- Campo Nombre (antes username) --}}
            <div class="form-floating form-floating-outline mb-5">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ingresa tu nombre completo" value="{{ old('name') }}" autofocus>
              <label for="name">Nombre Completo</label>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Campo Email --}}
            <div class="form-floating form-floating-outline mb-5">
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingresa tu e-mail" value="{{ old('email') }}">
              <label for="email">Email</label>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Campo Contraseña --}}
            <div class="mb-5 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline @error('password') is-invalid @enderror">
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="password">Contraseña</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
              </div>
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div> {{-- d-block para que se muestre si el input está dentro de input-group --}}
              @enderror
            </div>

            {{-- Campo Confirmar Contraseña (NUEVO) --}}
            <div class="mb-5 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                  <label for="password_confirmation">Confirmar Contraseña</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
              </div>
            </div>

            {{-- Campo Términos y Condiciones --}}
            <div class="mb-5 py-2">
              <div class="form-check @error('terms') is-invalid @enderror mb-0">
                <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms-conditions" name="terms" value="1"> {{-- value="1" es opcional pero buena práctica --}}
                <label class="form-check-label" for="terms-conditions">
                  He leído y acepto las
                  <a href="javascript:void(0);">políticas de privacidad de datos</a>
                </label>
              </div>
              @error('terms')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <button class="btn btn-primary d-grid w-100 mb-5" type="submit"> {{-- Añadido type="submit" por claridad --}}
              Registrarme
            </button>
          </form>

          <p class="text-center mb-5">
            <span>¿Ya tienes una cuenta?</span>
            <a href="{{url('auth/login-basic')}}"> {{-- O la URL/ruta de tu login --}}
              <span>Iniciar sesión</span>
            </a>
          </p>
        </div>
      </div>
      </div>
  </div>
</div>
@endsection
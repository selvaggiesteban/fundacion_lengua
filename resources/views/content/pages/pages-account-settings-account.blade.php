@extends('layouts/contentNavbarLayout')

@section('title', 'Configuración de la cuenta')

@section('page-script')
@vite(['resources/assets/js/pages-account-settings-account.js'])
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="nav-align-top">
      <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
        <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ri-group-line me-1_5"></i>Cuenta</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="ri-notification-4-line me-1_5"></i>Notificaciones</a></li>
      </ul>
    </div>
    <div class="card mb-6">
      <div class="card-body">

        {{-- Muestra un mensaje de éxito si la sesión lo contiene --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Muestra los errores de validación si existen --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="formAccountSettings" method="POST" action="{{ route('pages-account-settings-account.update') }}" enctype="multipart/form-data">
          @csrf
          <div class="d-flex align-items-start align-items-sm-center gap-6">
            <img src="{{ Auth::user()->avatar_url }}" alt="avatar-de-usuario" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
            <div class="button-wrapper">
              <label for="upload" class="btn btn-sm btn-primary me-3 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Subir nueva foto</span>
                <i class="ri-upload-2-line d-block d-sm-none"></i>
                <input type="file" id="upload" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg" />
              </label>
              <button type="button" class="btn btn-sm btn-outline-danger account-image-reset mb-4">
                <i class="ri-refresh-line d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Restablecer</span>
              </button>
              <div>Permitidos JPG, JPEG o PNG. Tamaño máximo de 300K.</div>
            </div>
          </div>
          
          <div class="card-body pt-0">
            <div class="row mt-1 g-5">
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" autofocus />
                  <label for="name">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" placeholder="Pérez" />
                  <label for="lastName">Apellido</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" />
                  <label for="email">Correo Electrónico</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" id="organization" name="organization" value="{{config('variables.creatorName')}}" />
                  <label for="organization">Organización</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group input-group-merge">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="912 345 678" />
                    <label for="phoneNumber">Número de Teléfono</label>
                  </div>
                  <span class="input-group-text">España (+34)</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" />
                  <label for="address">Dirección</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" id="state" name="state" placeholder="Madrid" />
                  <label for="state">Estado</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="28001" maxlength="6" />
                  <label for="zipCode">Código Postal</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <select id="country" class="select2 form-select">
                    <option value="">Seleccionar</option>
                    <option value="Australia">Australia</option>
                    <option value="Bangladesh">Bangladés</option>
                    <option value="Belarus">Bielorrusia</option>
                    <option value="Brazil">Brasil</option>
                    <option value="Canada">Canadá</option>
                    <option value="China">China</option>
                    <option value="France">Francia</option>
                    <option value="Germany">Alemania</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italia</option>
                    <option value="Japan">Japón</option>
                    <option value="Korea">Corea del Sur</option>
                    <option value="Mexico">México</option>
                    <option value="Philippines">Filipinas</option>
                    <option value="Russia">Rusia</option>
                    <option value="South Africa">Sudáfrica</option>
                    <option value="Thailand">Tailandia</option>
                    <option value="Turkey">Turquía</option>
                    <option value="Ukraine">Ucrania</option>
                    <option value="United Arab Emirates">Emiratos Árabes Unidos</option>
                    <option value="United Kingdom">Reino Unido</option>
                    <option value="United States">Estados Unidos</option>
                  </select>
                  <label for="country">País</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <select id="language" class="select2 form-select">
                    <option value="">Seleccionar idioma</option>
                    <option value="en">Inglés</option>
                    <option value="fr">Francés</option>
                    <option value="de">Alemán</option>
                    <option value="pt">Portugués</option>
                  </select>
                  <label for="language">Idioma</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <select id="timeZones" class="select2 form-select">
                    <option value="">Seleccionar zona horaria</option>
                    <option value="-12">(GMT-12:00) Línea internacional de cambio de fecha Oeste</option>
                    <option value="-11">(GMT-11:00) Isla Midway, Samoa</option>
                    <option value="-10">(GMT-10:00) Hawái</option>
                    <option value="-9">(GMT-09:00) Alaska</option>
                    <option value="-8">(GMT-08:00) Hora del Pacífico (EE. UU. y Canadá)</option>
                    <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                    <option value="-7">(GMT-07:00) Arizona</option>
                    <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlán</option>
                    <option value="-7">(GMT-07:00) Hora de la Montaña (EE. UU. y Canadá)</option>
                    <option value="-6">(GMT-06:00) América Central</option>
                    <option value="-6">(GMT-06:00) Hora Central (EE. UU. y Canadá)</option>
                    <option value="-6">(GMT-06:00) Guadalajara, Ciudad de México, Monterrey</option>
                    <option value="-6">(GMT-06:00) Saskatchewan</option>
                    <option value="-5">(GMT-05:00) Bogotá, Lima, Quito, Río Branco</option>
                    <option value="-5">(GMT-05:00) Hora del Este (EE. UU. y Canadá)</option>
                    <option value="-5">(GMT-05:00) Indiana (Este)</option>
                    <option value="-4">(GMT-04:00) Hora del Atlántico (Canadá)</option>
                    <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                  </select>
                  <label for="timeZones">Zona horaria</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <select id="currency" class="select2 form-select">
                    <option value="">Seleccionar moneda</option>
                    <option value="usd">USD</option>
                    <option value="euro">Euro</option>
                    <option value="pound">Libra</option>
                    <option value="bitcoin">Bitcoin</option>
                  </select>
                  <label for="currency">Moneda</label>
                </div>
              </div>
            </div>
            <div class="mt-6">
              <button type="submit" class="btn btn-primary me-3">Guardar cambios</button>
              <button type="reset" class="btn btn-outline-secondary">Restablecer</button>
            </div>
          </div>
        </form>
      </div>
      </div>
    <div class="card">
      <h5 class="card-header">Eliminar cuenta</h5>
      <div class="card-body">
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-6 ms-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">Confirmo la desactivación de mi cuenta</label>
          </div>
          <button type="submit" class="btn btn-danger deactivate-account" disabled>Desactivar cuenta</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
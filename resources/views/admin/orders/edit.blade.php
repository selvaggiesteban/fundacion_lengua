@extends('layouts.contentNavbarLayout')

@section('title', 'Editar Pedido')

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Administración / Pedidos /</span> Editar
</h4>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Editar Pedido #{{ $order->order_number }}</h5>
    </div>
    <div class="card-body">
        {{-- Solo Admins y SuperAdmins pueden acceder a esta vista según el controlador --}}
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Laravel usa PUT/PATCH para actualizar --}}

            <div class="mb-3">
                <label for="user_name" class="form-label">Usuario</label>
                {{-- No editable, solo para mostrar --}}
                <input type="text" class="form-control" id="user_name" value="{{ $order->user->name }} ({{ $order->user->email }})" disabled>
            </div>

            <div class="mb-3">
                <label for="order_date" class="form-label">Fecha del Pedido</label>
                {{-- No editable, solo para mostrar --}}
                <input type="text" class="form-control" id="order_date" value="{{ $order->order_date->format('d/m/Y H:i') }}" disabled>
            </div>

            <div class="mb-3">
                <label for="total_amount" class="form-label">Cantidad Total</label>
                <input type="number" step="0.01" class="form-control @error('total_amount') is-invalid @enderror" id="total_amount" name="total_amount" value="{{ old('total_amount', $order->total_amount) }}" required>
                @error('total_amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Método de Pago</label>
                <input type="text" class="form-control @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" value="{{ old('payment_method', $order->payment_method) }}">
                @error('payment_method')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción (Opcional)</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $order->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nuevos campos de Tipo de Curso --}}
            <hr class="my-4">
            <h6 class="mb-3">Datos del Curso</h6>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="course_type" class="form-label">Tipo de Curso</label>
                    <input type="text" class="form-control @error('course_type') is-invalid @enderror" id="course_type" name="course_type" value="{{ old('course_type', $order->course_type) }}">
                    @error('course_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="accommodation" class="form-label">Alojamiento</label>
                    <input type="text" class="form-control @error('accommodation') is-invalid @enderror" id="accommodation" name="accommodation" value="{{ old('accommodation', $order->accommodation) }}">
                    @error('accommodation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="weeks" class="form-label">Semanas</label>
                    <input type="number" class="form-control @error('weeks') is-invalid @enderror" id="weeks" name="weeks" value="{{ old('weeks', $order->weeks) }}">
                    @error('weeks')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="start_date" class="form-label">Comienzo</label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $order->start_date ? $order->start_date->format('Y-m-d') : '') }}">
                    @error('start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 form-check form-switch">
                    <input class="form-check-input @error('insurance') is-invalid @enderror" type="checkbox" id="insurance" name="insurance" value="1" {{ old('insurance', $order->insurance) ? 'checked' : '' }}>
                    <label class="form-check-label" for="insurance">Seguro</label>
                    @error('insurance')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3 form-check form-switch">
                    <input class="form-check-input @error('transport') is-invalid @enderror" type="checkbox" id="transport" name="transport" value="1" {{ old('transport', $order->transport) ? 'checked' : '' }}>
                    <label class="form-check-label" for="transport">Transporte</label>
                    @error('transport')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 form-check form-switch">
                    <input class="form-check-input @error('parking_available') is-invalid @enderror" type="checkbox" id="parking_available" name="parking_available" value="1" {{ old('parking_available', $order->parking_available) ? 'checked' : '' }}>
                    <label class="form-check-label" for="parking_available">Parking (Bajo disponibilidad)</label>
                    @error('parking_available')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3 form-check form-switch">
                    <input class="form-check-input @error('cancellation_policy') is-invalid @enderror" type="checkbox" id="cancellation_policy" name="cancellation_policy" value="1" {{ old('cancellation_policy', $order->cancellation_policy) ? 'checked' : '' }}>
                    <label class="form-check-label" for="cancellation_policy">Cancelación</label>
                    @error('cancellation_policy')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 form-check form-switch">
                    <input class="form-check-input @error('university_certificate_ects') is-invalid @enderror" type="checkbox" id="university_certificate_ects" name="university_certificate_ects" value="1" {{ old('university_certificate_ects', $order->university_certificate_ects) ? 'checked' : '' }}>
                    <label class="form-check-label" for="university_certificate_ects">Certificado Universitario + ECTs</label>
                    @error('university_certificate_ects')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="destination" class="form-label">Destino</label>
                    <input type="text" class="form-control @error('destination') is-invalid @enderror" id="destination" name="destination" value="{{ old('destination', $order->destination) }}">
                    @error('destination')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="discount_code" class="form-label">Código descuento</label>
                <input type="text" class="form-control @error('discount_code') is-invalid @enderror" id="discount_code" name="discount_code" value="{{ old('discount_code', $order->discount_code) }}">
                @error('discount_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- Nuevos campos de Datos Personales --}}
            <hr class="my-4">
            <h6 class="mb-3">Datos Personales del Solicitante</h6>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="full_name" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name', $order->full_name) }}">
                    @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $order->email) }}">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="phone_number" class="form-label">Teléfono</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $order->phone_number) }}">
                    @error('phone_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="passport_number" class="form-label">Pasaporte</label>
                    <input type="text" class="form-control @error('passport_number') is-invalid @enderror" id="passport_number" name="passport_number" value="{{ old('passport_number', $order->passport_number) }}">
                    @error('passport_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $order->address) }}">
                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="country" class="form-label">País</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', $order->country) }}">
                    @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="postal_code" class="form-label">C.P. (Código postal)</label>
                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code', $order->postal_code) }}">
                    @error('postal_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $order->city) }}">
                    @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="province" class="form-label">Provincia</label>
                    <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province', $order->province) }}">
                    @error('province')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="language" class="form-label">Su idioma</label>
                    <input type="text" class="form-control @error('language') is-invalid @enderror" id="language" name="language" value="{{ old('language', $order->language) }}">
                    @error('language')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="second_language" class="form-label">Su segundo idioma</label>
                    <input type="text" class="form-control @error('second_language') is-invalid @enderror" id="second_language" name="second_language" value="{{ old('second_language', $order->second_language) }}">
                    @error('second_language')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="spanish_level" class="form-label">Nivel de español</label>
                    <input type="text" class="form-control @error('spanish_level') is-invalid @enderror" id="spanish_level" name="spanish_level" value="{{ old('spanish_level', $order->spanish_level) }}">
                    @error('spanish_level')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="study_center_name" class="form-label">Nombre del Centro</label>
                    <input type="text" class="form-control @error('study_center_name') is-invalid @enderror" id="study_center_name" name="study_center_name" value="{{ old('study_center_name', $order->study_center_name) }}">
                    @error('study_center_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="birth_date" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date', $order->birth_date ? $order->birth_date->format('Y-m-d') : '') }}">
                    @error('birth_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Sexo</label>
                    <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ old('gender', $order->gender) }}">
                    @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 form-check form-switch">
                    <input class="form-check-input @error('smoking_preference') is-invalid @enderror" type="checkbox" id="smoking_preference" name="smoking_preference" value="1" {{ old('smoking_preference', $order->smoking_preference) ? 'checked' : '' }}>
                    <label class="form-check-label" for="smoking_preference">Tabaco</label>
                    @error('smoking_preference')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3 form-check form-switch">
                    <input class="form-check-input @error('pets_preference') is-invalid @enderror" type="checkbox" id="pets_preference" name="pets_preference" value="1" {{ old('pets_preference', $order->pets_preference) ? 'checked' : '' }}>
                    <label class="form-check-label" for="pets_preference">Mascotas</label>
                    @error('pets_preference')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notas</label>
                <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes', $order->notes) }}</textarea>
                @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>


            <div class="mb-3">
                <label for="status" class="form-label">Estado del Pedido</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    @foreach($statuses as $value => $label)
                        <option value="{{ $value }}" {{ old('status', $order->status) == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Pedido</button>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
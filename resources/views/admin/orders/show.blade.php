@extends('layouts.contentNavbarLayout')

@section('title', 'Detalles del Pedido')

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">
        @if(Auth::user()->isStudent())
            Estudiante / Mis Pedidos /
        @else
            Administración / Pedidos /
        @endif
    </span> Detalles
</h4>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detalles del Pedido #{{ $order->order_number }}</h5>
        <div>
            {{-- Botón Editar (Solo Admin/SuperAdmin) --}}
            @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-info btn-sm me-2" title="Editar Pedido Completo">
                <i class="ri-pencil-line me-1"></i> Editar Pedido
            </a>
            @endif
            {{-- Botón Volver --}}
            <a href="{{ Auth::user()->isStudent() ? route('student.orders.index') : route('admin.orders.index') }}" class="btn btn-secondary btn-sm">
                <i class="ri-arrow-left-line me-1"></i> Volver al Listado
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Número de Pedido:</strong>
                <p>{{ $order->order_number }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Fecha del Pedido:</strong>
                <p>{{ $order->order_date->format('d/m/Y H:i') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Cantidad Total:</strong>
                <p>{{ number_format($order->total_amount, 2, ',', '.') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Estado:</strong>
                <p>
                    <span class="badge bg-label-{{
                        $order->status === App\Models\Order::STATUS_PENDING ? 'warning' : (
                        $order->status === App\Models\Order::STATUS_PAID ? 'success' : (
                        $order->status === App\Models\Order::STATUS_SENT ? 'info' : (
                        $order->status === App\Models\Order::STATUS_SERVED ? 'primary' : (
                        $order->status === App\Models\Order::STATUS_CANCELED ? 'danger' : 'secondary'
                        )))))}}">
                        {{ $statuses[$order->status] ?? ucfirst($order->status) }}
                    </span>
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Método de Pago:</strong>
                <p>{{ $order->payment_method ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Descripción:</strong>
                <p>{{ $order->description ?? 'Sin descripción' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Pedido Realizado Por:</strong>
                <p>{{ $order->user->name }} ({{ $order->user->email }})</p>
            </div>

            {{-- Detalles del Curso --}}
            <div class="col-12"><hr class="my-3"></div>
            <div class="col-12"><h5>Detalles del Curso</h5></div>

            <div class="col-md-6 mb-3">
                <strong>Tipo de Curso:</strong>
                <p>{{ $order->course_type ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Alojamiento:</strong>
                <p>{{ $order->accommodation ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Semanas:</strong>
                <p>{{ $order->weeks ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Comienzo:</strong>
                <p>{{ $order->start_date ? $order->start_date->format('d/m/Y') : 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Seguro:</strong>
                <p>{{ $order->insurance ? 'Sí' : 'No' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Transporte:</strong>
                <p>{{ $order->transport ? 'Sí' : 'No' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Parking (Bajo disponibilidad):</strong>
                <p>{{ $order->parking_available ? 'Sí' : 'No' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Cancelación:</strong>
                <p>{{ $order->cancellation_policy ? 'Sí' : 'No' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Certificado Universitario + ECTs:</strong>
                <p>{{ $order->university_certificate_ects ? 'Sí' : 'No' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Destino:</strong>
                <p>{{ $order->destination ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Código Descuento:</strong>
                <p>{{ $order->discount_code ?? 'N/A' }}</p>
            </div>

            {{-- Datos Personales del Solicitante --}}
            <div class="col-12"><hr class="my-3"></div>
            <div class="col-12"><h5>Datos Personales del Solicitante</h5></div>

            <div class="col-md-6 mb-3">
                <strong>Nombre Completo:</strong>
                <p>{{ $order->full_name ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Email Personal:</strong>
                <p>{{ $order->email ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Teléfono:</strong>
                <p>{{ $order->phone_number ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Pasaporte:</strong>
                <p>{{ $order->passport_number ?? 'N/A' }}</p>
            </div>
            <div class="col-md-12 mb-3">
                <strong>Dirección:</strong>
                <p>{{ $order->address ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>País:</strong>
                <p>{{ $order->country ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Código Postal:</strong>
                <p>{{ $order->postal_code ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Ciudad:</strong>
                <p>{{ $order->city ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Provincia:</strong>
                <p>{{ $order->province ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Idioma:</strong>
                <p>{{ $order->language ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Segundo Idioma:</strong>
                <p>{{ $order->second_language ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Nivel de Español:</strong>
                <p>{{ $order->spanish_level ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Nombre del Centro de Estudio:</strong>
                <p>{{ $order->study_center_name ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Fecha de Nacimiento:</strong>
                <p>{{ $order->birth_date ? $order->birth_date->format('d/m/Y') : 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Sexo:</strong>
                <p>{{ $order->gender ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Preferencia Tabaco:</strong>
                <p>{{ $order->smoking_preference ? 'Sí' : 'No' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Preferencia Mascotas:</strong>
                <p>{{ $order->pets_preference ? 'Sí' : 'No' }}</p>
            </div>
            <div class="col-md-12 mb-3">
                <strong>Notas:</strong>
                <p>{{ $order->notes ?? 'Sin notas' }}</p>
            </div>


            <div class="col-md-6 mb-3">
                <strong>Creado el:</strong>
                <p>{{ $order->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Última Actualización:</strong>
                <p>{{ $order->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
            @if($order->deleted_at)
            <div class="col-md-6 mb-3">
                <strong>Eliminado el (Soft Deleted):</strong>
                <p>{{ $order->deleted_at->format('d/m/Y H:i:s') }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
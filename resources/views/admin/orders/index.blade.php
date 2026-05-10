@extends('layouts.contentNavbarLayout')

@section('title', 'Gestión de Pedidos')

@section('vendor-style')
{{-- CSS files are already included in app.js --}}
@endsection

@section('vendor-script')
{{-- JS files are already included in app.js --}}
@endsection

@section('page-script')
{{-- JavaScript functionality is now handled in app.js --}}
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Administración /</span> Pedidos
</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Listado de Pedidos</h5>
        {{-- Botón para crear nuevo pedido, visible para todos los roles que pueden crear (Admin/SuperAdmin/Student) --}}
        @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin() || Auth::user()->isStudent())
        <a href="{{ Auth::user()->isStudent() ? route('student.orders.create') : route('admin.orders.create') }}" class="btn btn-primary">
            <i class="ri-add-line me-1"></i> Crear Nuevo Pedido
        </a>
        @endif
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables-orders table border-top">
            <thead>
                    <tr>
                        <th>Nº Pedido</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                        <th>Método Pago</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->order_number ?? 'N/A' }}</td>
                        <td>{{ $order->order_date ? $order->order_date->format('d/m/Y H:i') : 'N/A' }}</td>
                        <td>{{ $order->total_amount ? number_format($order->total_amount, 2, ',', '.') : 'N/A' }}</td>
                        <td>
                            <span class="badge bg-label-{{ 
                                $order->status === App\Models\Order::STATUS_PENDING ? 'warning' : (
                                $order->status === App\Models\Order::STATUS_PAID ? 'success' : (
                                $order->status === App\Models\Order::STATUS_SENT ? 'info' : (
                                $order->status === App\Models\Order::STATUS_SERVED ? 'primary' : (
                                $order->status === App\Models\Order::STATUS_CANCELED ? 'danger' : 'secondary'
                                ))))}}">
                                {{ $statuses[$order->status] ?? ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->payment_method ?? 'N/A' }}</td>
                        <td>{{ optional($order->user)->name ?? 'N/A' }} ({{ optional($order->user)->email ?? 'N/A' }})</td>
                        <td>
                            <div class="d-inline-block">
                                {{-- Botón Ver Detalles (visible para todos los que listan) --}}
                                <a href="{{ Auth::user()->isStudent() ? route('student.orders.show', $order->id) : route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-icon">
                                    <i class="ri-eye-line"></i>
                                </a>

                                {{-- Botón Editar (solo Admin/SuperAdmin) --}}
                                @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-icon">
                                    <i class="ri-pencil-line"></i>
                                </a>
                                @endif

                                {{-- Botón Eliminar (solo Admin/SuperAdmin) --}}
                                @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-icon delete-record" data-id="{{ $order->id }}">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

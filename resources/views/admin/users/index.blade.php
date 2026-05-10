@extends('layouts/contentNavbarLayout')
@vite(['resources/js/app.js'])
@section('title', 'Gestión de Usuarios')

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
  <span class="text-muted fw-light">Administración /</span> Usuarios
</h4>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
     @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<div class="card">
  <div class="card-header">
    <h5 class="mb-0">Gestión de Usuarios</h5>
    <p class="text-muted mb-0 mt-1">Los usuarios se registran a través del formulario público de registro</p>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table border-top">
      <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Verificado</th>
            <th>Registrado</th>
            <th>Actualizado</th>
            <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if($user->email_verified_at)
                    <span class="badge bg-success">Sí</span> ({{ $user->email_verified_at->format('d/m/Y H:i') }})
                @else
                    <span class="badge bg-warning">No</span>
                @endif
            </td>
            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
            <td>
              <div class="d-inline-block">
                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-icon">
                    <i class="ri-eye-line"></i>
                </a>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-icon">
                    <i class="ri-pencil-line"></i>
                </a>
                @if(auth()->id() != $user->id) {{-- No permitir eliminar al usuario logueado --}}
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" class="delete-form-user" data-user-name="{{ $user->name }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon item-delete" title="Eliminar">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </form>
                @else
                <button type="button" class="btn btn-sm btn-icon" title="No puedes eliminar tu propia cuenta" disabled>
                    <i class="ri-delete-bin-line"></i>
                </button>
                @endif
              </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No hay usuarios registrados.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

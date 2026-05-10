@extends('layouts.contentNavbarLayout')

@section('title', 'Gestión de Tests')

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
  <span class="text-muted fw-light">Administración /</span> Tests
</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Listado de Tests</h5>
        <a href="{{ route('admin.tests.create') }}" class="btn btn-primary">
            <i class="ri-add-line me-1"></i> Crear Nuevo Test
        </a>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables-tests table border-top">
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Preguntas</th>
                        <th>Creado En</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($tests as $test)
                    <tr>
                        <td>{{ $test->id }}</td>
                        <td>{{ $test->title }}</td>
                        <td>{{ Str::limit($test->description, 50) }}</td> {{-- Limitar descripción para la tabla --}}
                        <td>{{ $test->questions_count }}</td> {{-- Acceder al conteo de preguntas --}}
                        <td>{{ $test->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="d-inline-block">
                                <a href="{{ route('admin.tests.show', $test->id) }}" class="btn btn-sm btn-icon">
                                    <i class="ri-eye-line"></i>
                                </a>
                                <a href="{{ route('admin.tests.edit', $test->id) }}" class="btn btn-sm btn-icon">
                                    <i class="ri-pencil-line"></i>
                                </a>
                                <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-icon delete-record" data-id="{{ $test->id }}">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay tests registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

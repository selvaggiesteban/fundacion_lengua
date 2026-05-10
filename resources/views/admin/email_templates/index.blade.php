{{-- Asumiendo que tienes un layout base para tu panel de admin --}}
@extends('layouts/contentNavbarLayout')
@vite(['resources/js/app.js'])
@section('title', 'Plantillas de Email')

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
  <span class="text-muted fw-light">Administración /</span> Plantillas de Email
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

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Gestión de Plantillas</h5>
    <a href="{{ route('admin.email-templates.create') }}" class="btn btn-primary">
      <i class="ri-add-line me-1"></i> Crear Nueva Plantilla
    </a>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-templates table border-top">
      <thead>
        <tr>
            <th>ID</th>
            <th>Asunto</th>
            <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($templates as $template)
        <tr>
            <td>{{ $template->id }}</td>
            <td>{{ Str::limit($template->subject, 50) }}</td>
            <td>
              <div class="d-inline-block">
                <a href="{{ route('admin.email-templates.show', $template->id) }}" class="btn btn-sm btn-icon">
                    <i class="ri-eye-line"></i>
                </a>
                <a href="{{ route('admin.email-templates.edit', $template->id) }}" class="btn btn-sm btn-icon">
                    <i class="ri-pencil-line"></i>
                </a>
                <form action="{{ route('admin.email-templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-icon delete-record" data-id="{{ $template->id }}">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </form>
              </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No hay plantillas de email creadas todavía.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

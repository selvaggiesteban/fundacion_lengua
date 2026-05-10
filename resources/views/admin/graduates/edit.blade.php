    @extends('layouts/contentNavbarLayout')
    @vite(['resources/js/app.js'])
    @section('title', 'Editar Galería por Fecha')

    @section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Editar Galería: {{ $graduate->name }} ({{ \Carbon\Carbon::parse($graduate->event_date)->format('d/m/Y') }})</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detalles de la Galería</h6>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.graduates.update', $graduate->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.graduates._form', ['graduate' => $graduate])
                </form>
            </div>
        </div>
    </div>
    @endsection
    
    @extends('layouts/contentNavbarLayout')
    @vite(['resources/js/app.js'])
    @section('title', 'Crear Nueva Galería por Fecha')

    @section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Crear Nueva Galería por Fecha</h1>
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

                <form action="{{ route('admin.graduates.store') }}" method="POST" enctype="multipart/form-data">
                    @include('admin.graduates._form')
                </form>
            </div>
        </div>
    </div>
    @endsection
    
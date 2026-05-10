@extends('layouts/contentNavbarLayout')

@section('title', 'Gestión de Mensajes')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Administración /</span> Mensajes
</h4>
<div class="container-xxl flex-grow-1 container-p-y">
    @livewire('admin.conversation-list')
</div>
@endsection 
@php
$isMenu = false;
$navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Sin menú - Diseños')

@section('content')

<!-- Demostración de Diseño -->
<div class="layout-demo-wrapper">
  <div class="layout-demo-placeholder">
    <img src="{{asset('assets/img/layouts/layout-without-menu-light.png')}}" class="img-fluid" alt="Layout without menu">
  </div>
  <div class="layout-demo-info">
    <h4>Diseño sin Menú (Navegación)</h4>
    <button class="btn btn-primary" type="button" onclick="history.back()">Volver</button>
  </div>
</div>
<!--/ Demostración de Diseño -->

@endsection

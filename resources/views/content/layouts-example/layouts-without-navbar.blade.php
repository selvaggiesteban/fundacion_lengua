@php
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Sin barra de navegación - Diseños')

@section('content')

<!-- Demostración de Diseño -->
<div class="layout-demo-wrapper">
  <div class="layout-demo-placeholder">
    <img src="{{asset('assets/img/layouts/layout-without-navbar-light.png')}}" class="img-fluid" alt="Layout without navbar">
  </div>
  <div class="layout-demo-info">
    <h4>Diseño sin Barra de Navegación</h4>
    <p>El diseño no contiene el componente de la barra de navegación.</p>
  </div>
</div>
<!--/ Demostración de Diseño -->

@endsection

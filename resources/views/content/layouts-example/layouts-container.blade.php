@php
$container = 'container-xxl';
$containerNav = 'container-xxl';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Contenedor - Diseños')

@section('content')
<!-- Demostración de Diseño -->
<div class="layout-demo-wrapper">
  <div class="layout-demo-placeholder">
    <img src="{{asset('assets/img/layouts/layout-container-light.png')}}" class="img-fluid" alt="Layout container">
  </div>
  <div class="layout-demo-info">
    <h4>Diseño de contenedor</h4>
    <p>El diseño de contenedor establece un `max-width` en cada breakpoint responsivo.</p>
  </div>
</div>
<!--/ Demostración de Diseño -->
@endsection

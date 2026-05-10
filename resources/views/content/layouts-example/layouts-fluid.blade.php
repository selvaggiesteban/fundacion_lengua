@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Fluido - Diseños')

@section('content')
<!-- Demostración de Diseño -->
<div class="layout-demo-wrapper">
  <div class="layout-demo-placeholder">
    <img src="{{asset('assets/img/layouts/layout-fluid-light.png')}}" class="img-fluid" alt="Layout fluid">
  </div>
  <div class="layout-demo-info">
    <h4>Diseño fluido</h4>
    <p>El diseño fluido establece un `100% de ancho` en cada breakpoint responsivo.</p>
  </div>
</div>
<!--/ Demostración de Diseño -->
@endsection

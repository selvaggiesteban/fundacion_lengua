@extends('layouts/commonMaster' )

@php
/* Display elements */
$contentNavbar = true;
$containerNav = ($containerNav ?? 'container-xxl');
$isNavbar = ($isNavbar ?? true);
$isMenu = ($isMenu ?? true);
$isFlex = ($isFlex ?? false);
$isFooter = ($isFooter ?? true);

/* HTML Classes */
$navbarDetached = 'navbar-detached';

/* Content classes */
$container = ($container ?? 'container-xxl');

@endphp

@section('layoutContent')
<div class="layout-wrapper layout-content-navbar {{ $isMenu ? '' : 'layout-without-menu' }}">
  <div class="layout-container">

    @if ($isMenu)
    @include('layouts/sections/menu/verticalMenu')
    @endif


    <!-- Página de diseño -->
    <div class="layout-page">
      <!-- INICIO: Barra de navegación-->
      @if ($isNavbar)
      @include('layouts/sections/navbar/navbar')
      @endif
      <!-- FIN: Barra de navegación-->


      <!-- Contenedor de contenido -->
      <div class="content-wrapper">

        <!-- Contenido -->
        @if ($isFlex)
        <div class="{{$container}} d-flex align-items-stretch flex-grow-1 p-0">
          @else
          <div class="{{$container}} flex-grow-1 container-p-y">
            @endif

            @yield('content')

          </div>
          <!-- / Contenido -->

          <!-- Pie de página -->
          @if ($isFooter)
          @include('layouts/sections/footer/footer')
          @endif
          <!-- / Pie de página -->
          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Contenedor de diseño -->
      </div>
      <!-- / Página de diseño -->
    </div>

    @if ($isMenu)
    <!-- Superposición -->
    <div class="layout-overlay layout-menu-toggle"></div>
    @endif
    <!-- Arrastrar área de destino para deslizar el menú en pantallas pequeñas -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
  @endsection

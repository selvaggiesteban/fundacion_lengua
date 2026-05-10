@extends('layouts/contentNavbarLayout')

@section('title', 'Divisor de texto - UI extendida')

@section('content')
<div class="row">
  <!-- Básico -->
  <div class="col-md-12 mb-6">
    <div class="card">
      <h5 class="card-header">Básico</h5>
      <div class="card-body">
        <div class="divider">
          <div class="divider-text">Texto</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Básico -->

  <!-- Alineación del texto -->
  <div class="col-md-12 mb-6">
    <div class="card">
      <h5 class="card-header">Alineación</h5>
      <div class="card-body">
        <div class="divider text-start">
          <div class="divider-text">Inicio</div>
        </div>
        <div class="divider text-start-center">
          <div class="divider-text">Inicio-Centro</div>
        </div>
        <div class="divider">
          <div class="divider-text">Centro (Por defecto)</div>
        </div>
        <div class="divider text-end-center">
          <div class="divider-text">Fin-Centro</div>
        </div>
        <div class="divider text-end">
          <div class="divider-text">Fin</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Alineación del texto -->

  <!-- Colores del divisor -->
  <div class="col-md-12 mb-6">
    <div class="card">
      <h5 class="card-header">Colores</h5>
      <div class="card-body">
        <div class="divider divider-primary">
          <div class="divider-text">Primario</div>
        </div>
        <div class="divider divider-success">
          <div class="divider-text">Éxito</div>
        </div>
        <div class="divider divider-danger">
          <div class="divider-text">Peligro</div>
        </div>
        <div class="divider divider-warning">
          <div class="divider-text">Advertencia</div>
        </div>
        <div class="divider divider-info">
          <div class="divider-text">Información</div>
        </div>
        <div class="divider divider-dark">
          <div class="divider-text">Oscuro</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Colores del divisor -->

  <!-- Iconos -->
  <div class="col-md-12 mb-6">
    <div class="card">
      <h5 class="card-header">Iconos</h5>
      <div class="card-body">
        <div class="divider text-start">
          <div class="divider-text">
            <i class="ri-sun-fill"></i>
          </div>
        </div>
        <div class="divider text-start-center">
          <div class="divider-text">
            <i class="ri-vip-crown-line"></i>
          </div>
        </div>
        <div class="divider">
          <div class="divider-text">
            <i class="ri-star-line"></i>
          </div>
        </div>
        <div class="divider text-end-center">
          <div class="divider-text">
            <i class="ri-goblet-fill"></i>
          </div>
        </div>
        <div class="divider text-end">
          <div class="divider-text">
            <i class="ri-scissors-line ri-rotate-180"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Iconos -->

  <!-- Estilos -->
  <div class="col-md-12 mb-6">
    <div class="card">
      <h5 class="card-header">Estilos</h5>
      <div class="card-body">
        <div class="divider">
          <div class="divider-text">
            Sólido (Por defecto)
          </div>
        </div>
        <div class="divider divider-dotted">
          <div class="divider-text">
            Punteado
          </div>
        </div>
        <div class="divider divider-dashed">
          <div class="divider-text">
            Discontinuo
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Estilos -->
</div>
@endsection

@extends('layouts/contentNavbarLayout')

@section('title', 'Barra de desplazamiento perfecta - UI extendida')

@section('vendor-style')
@vite('resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')
@endsection

@section('page-script')
@vite('resources/assets/js/extended-ui-perfect-scrollbar.js')
@endsection

@section('content')
<div class="row">
  <!-- Barra de desplazamiento vertical -->
  <div class="col-md-6 col-sm-12">
    <div class="card overflow-hidden mb-6" style="height: 300px;">
      <h5 class="card-header">Barra de desplazamiento vertical</h5>
      <div class="card-body" id="vertical-example">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
          Curabitur pretium tincidunt lacus, eget vulputate odio hendrerit in. Fusce nec hendrerit ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed et nisl vel nulla efficitur aliquet. Quisque eget justo nec ex fringilla dictum. Donec vel odio quis ligula aliquam feugiat. Sed vitae quam vel justo scelerisque elementum.
        </p>
        <p>
          Phasellus accumsan, justo nec lacinia accumsan, ipsum urna varius urna, vel malesuada enim justo sit amet odio. Integer efficitur, nulla at interdum malesuada, turpis leo hendrerit libero, vitae egestas ipsum sem vel est. Nullam nec urna a magna ultrices facilisis non vel nulla. Nulla facilisi. Sed non mauris sit amet elit feugiat auctor. Quisque a magna at ligula blandit lacinia.
        </p>
        <p>
          Sweet roll I love I love. Tiramisu I love soufflé cake tart sweet roll
          cotton candy cookie. Macaroon biscuit dessert. Bonbon cake soufflé
          jelly gummi bears lemon drops. Chocolate bar I love macaroon danish
          candy pudding. Jelly carrot cake I love tart cake bear claw macaroon
          candy candy canes. Muffin gingerbread sweet jujubes croissant sweet
          roll. Topping muffin carrot cake sweet. Toffee chocolate muffin I love
          croissant. Donut carrot cake ice cream ice cream. Wafer I love pie
          danish marshmallow cheesecake oat cake pie I love. Icing pie chocolate
          marzipan jelly ice cream cake.
        </p>
        <p>
          Sweet roll I love I love. Tiramisu I love soufflé cake tart sweet roll
          cotton candy cookie. Macaroon biscuit dessert. Bonbon cake soufflé
          jelly gummi bears lemon drops. Chocolate bar I love macaroon danish
          candy pudding. Jelly carrot cake I love tart cake bear claw macaroon
          candy candy canes. Muffin gingerbread sweet jujubes croissant sweet
          roll. Topping muffin carrot cake sweet. Toffee chocolate muffin I love
          croissant. Donut carrot cake ice cream ice cream. Wafer I love pie
          danish marshmallow cheesecake oat cake pie I love. Icing pie chocolate
          marzipan jelly ice cream cake.
        </p>
        <p>
          Sweet roll I love I love. Tiramisu I love soufflé cake tart sweet roll
          cotton candy cookie. Macaroon biscuit dessert. Bonbon cake soufflé
          jelly gummi bears lemon drops. Chocolate bar I love macaroon danish
          candy pudding. Jelly carrot cake I love tart cake bear claw macaroon
          candy candy canes. Muffin gingerbread sweet jujubes croissant sweet
          roll. Topping muffin carrot cake sweet. Toffee chocolate muffin I love
          croissant. Donut carrot cake ice cream ice cream. Wafer I love pie
          danish marshmallow cheesecake oat cake pie I love. Icing pie chocolate
          marzipan jelly ice cream cake.
        </p>
      </div>
    </div>
  </div>
  <!--/ Barra de desplazamiento vertical -->

  <!-- Barra de desplazamiento horizontal -->
  <div class="col-md-6 col-sm-12">
    <div class="card overflow-hidden mb-6" style="height: 300px;">
      <h5 class="card-header">Barra de desplazamiento horizontal</h5>
      <div class="card-body" id="horizontal-example">
        <img src="{{asset('assets/img/backgrounds/18.jpg')}}" alt="scrollbar-image" />
      </div>
    </div>
  </div>
  <!--/ Barra de desplazamiento horizontal -->

  <!-- Barras de desplazamiento vertical y horizontal -->
  <div class="col-12">
    <div class="card overflow-hidden" style="height: 500px;">
      <h5 class="card-header">Barras de desplazamiento vertical y horizontal</h5>
      <div class="card-body" id="both-scrollbars-example">
        <img src="{{asset('assets/img/backgrounds/18.jpg')}}" alt="scrollbar-image" />
      </div>
    </div>
  </div>
  <!--/ Barras de desplazamiento vertical y horizontal -->
</div>
@endsection

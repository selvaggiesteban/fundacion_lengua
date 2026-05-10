@extends('layouts.contentNavbarLayout')

@section('title', __('messages.student_panel'))

@section('content')
<div class="card">
  <div class="card-header">
    <h1 class="card-title mb-0">{{ __('messages.student_panel') }}</h1>
  </div>
  <div class="card-body">
    <p>{{ __('messages.hello_user', ['name' => Auth::user()->name]) }}</p>
    <p>Aquí podrás consultar información sobre tus becas, alojamientos y más.</p>

    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">{{ __('buttons.logout') }}</button>
    </form>
  </div>
</div>
@endsection
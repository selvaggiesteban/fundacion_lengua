@extends('layouts.contentNavbarLayout')

@section('title', __('messages.superadmin_panel'))

@section('content')
<div class="card">
  <div class="card-header">
    <h1 class="card-title mb-0">{{ __('messages.superadmin_panel') }}</h1>
  </div>
  <div class="card-body">
    <p>{{ __('messages.welcome_superadmin', ['name' => Auth::user()->name]) }}</p>
    <p>{{ __('messages.superadmin_description') }}</p>
    
    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">{{ __('buttons.logout') }}</button>
    </form>
  </div>
</div>
@endsection
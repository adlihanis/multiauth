@extends('layouts.bootstrap')
@include('layouts.style')
@extends('layouts.footer')
@extends('layouts.bar')

<div class="container-fluid bg mt-2">
  <div class="row align-items-center justify-content-center">
    <div class="col-sm-12 col-md-6">
      <div class="card p-5">
        <div class="card-body text-center">
          <img src="{{ asset('image/logo.png') }}" class="rounded mx-auto d-block" alt="Logo" style="max-width: 200px;">
          <h2 class="card-title mt-4">Welcome Back!</h2>

          @if (Route::has('login'))
            <div class="mt-4">
              @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
              @else
                <a class="btn btn-primary" href="{{ route('login') }}" role="button">Log in</a>
                @if (Route::has('register'))
                  <h6 class="card-subtitle mt-3 mb-2 text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-body">Register</a></h6>
                @endif
              @endauth
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

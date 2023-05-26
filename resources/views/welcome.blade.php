@extends('layouts.bootstrap')

<div class="container ">
  <div class="row align-items-center ">
    <div class="col"></div>
    <div class="col p-5">
      <div class="card p-5" style="width: 40rem;">
        <div class="card-body">
          <img src="{{asset('image/logo.png')}}" class="rounded mx-auto d-block" alt="...">
          <center><h2 class="card-title">Welcome Back!</h5>
        
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a class="btn btn-primary" href="{{ route('login') }}" role="button">Log in</a>

                        @if (Route::has('register'))
                        </br></br></br>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Don’t have an account? <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></h6>
                        @endif
                    @endauth
                </div>
            @endif
</center>
        </div>
        
      </div>
    </div>
    <div class="col"></div>
  </div>
</div>


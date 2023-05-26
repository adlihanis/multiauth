<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

@extends('layouts.bootstrap')
@include('layouts.style')
@extends('layouts.footer')
@extends('layouts.bar')


@section('content')

    <main class="col-md-12 ms-sm-auto col-lg-14 px-md-4 ">
      <!-- Title -->
      <div class="col md-8 text-center"></div>
        <section style="padding-top: 50px;">
            <div class="container bg-white shadow p-3 mb-5 rounded border-outline p-5">
                <div class="row">
                    <div class="col md-8 text-center">
                      <center><img src="{{asset('image/logo.png')}}" class="img-fluid" style="height: 160px;" alt="welcome"></center>
                      <h1>Welcome !</h1>
                        <h5 class="text-center mt-4"> {{ Auth::user()->name }}</h5>
                    </div>
                </div>
            </div>
        </section>

</main>

</x-app-layout>

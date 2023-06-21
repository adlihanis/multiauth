@extends('layouts.bootstrap')

<style>
    .custom-image {
        min-height: 100vh;
        width: 100%;
        height: auto;
    }

    .content-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .custom-content {
        max-width: 100%;
        margin: 0 auto;
    }
</style>

<div class="d-flex flex-column justify-content-start align-items-center pt-6 sm:pt-0" style="background-color: #D9F3C5; min-height: 100vh;">
    <div class="row mx-0">
        <div class="col-md-6 px-0">
            <img src="{{ asset('image/12.png') }}" class="rounded mx-auto d-block custom-image" alt="...">
        </div>
        <div class="col-md-6 px-0">
            <div class="bg-green p-4 h-100">
                <div class="content-wrapper">
                    <div class="custom-content">
                        {{ $logo }}
                        <div>
                            {{ $slot }}
                        </div>
                        <h6 class="card-subtitle mt-3 mb-2 text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-body">Register</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

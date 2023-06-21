<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADMIN USERS') }}
        </h2>
    </x-slot>
    
    <div class="container-fluid bg mt-2">
    <title>KTDI | Admin View</title>
@extends('layouts.bootstrap')
@include('layouts.style')
@extends('layouts.footer')
@extends('layouts.bar')
@section('content')

    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th> <!-- Add new column for the delete button -->
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($adminUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- Add delete button with a form -->
                            <form action="{{ route('adminusers.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('redirects') }}" class="btn btn-primary mb-2">Go Back</a>
    </div>
</div>
</x-app-layout>

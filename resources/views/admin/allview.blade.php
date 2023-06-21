<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ALL USERS') }}
        </h2>
    </x-slot>
    <title>KTDI | Student View</title>
    <div class="container-fluid bg mt-2">
        @extends('layouts.bootstrap')
        @include('layouts.style')
        @extends('layouts.footer')
        @extends('layouts.bar')
        @section('content')

        <form action="{{ route('home.search') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="email" name="search" class="form-control custom-search-input" placeholder="Search by email (must include @)" value="{{ $search }}" required>
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>

@if ($search)
    <div class="mb-3">
        <a href="{{ route('seeAll') }}" class="btn btn-secondary">Clear Search</a>
    </div>
@endif

@if (isset($notFoundMessage))
    <div class="alert alert-info mt-3">
        {{ $notFoundMessage }}
    </div>
@endif

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role (0=student,1=admin,2=staff)</th>
                        <th>Action</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($allUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <!-- Add delete button with a form -->
                                <form action="{{ route('allusers.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <!-- Add role change button with a form -->
                                <form action="{{ route('allusers.rolechange', $user->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" name="role" value="1" class="btn btn-success">Make Role 1</button>
                                    <button type="submit" name="role" value="2" class="btn btn-info">Make Role 2</button>
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

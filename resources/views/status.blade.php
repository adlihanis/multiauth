<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Status') }}
        </h2>
    </x-slot>
    <div class="container-fluid bg mt-2">

@extends('layouts.bootstrap')
@include('layouts.style')
@extends('layouts.footer')
@extends('layouts.bar')
   
@section('content')
    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date and Time</th>
                        <th>Status</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appliances as $appliance)
                        <tr>
                            <td>{{ $appliance->user->name }}</td>
                            <td>{{ $appliance->created_at }}</td>
                            <td>
                                @if ($appliance->approval_status == 'approved')
                                    <span class="text-success">Approved</span>
                                @elseif ($appliance->approval_status == 'rejected')
                                    <span class="text-danger">Rejected</span>
                                @else
                                    <span class="text-muted">Pending Approval</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="location.href='{{ route('application.show', ['id' => $appliance->id]) }}'">
                                    {{ $appliance->user->name }} - {{ $appliance->created_at }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

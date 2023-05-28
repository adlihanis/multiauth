@extends('layouts.bootstrap')

@php
    $filename = Str::random(10) . '.svg';
    Storage::disk('public')->put($filename, $qrCode);
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Status') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date and Time</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Link</th>
                        <th>QR Code</th>
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
                                <form action="{{ route('delete', $appliance->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="location.href='{{ route('application.show', ['id' => $appliance->id]) }}'">
                                    {{ $appliance->user->name }} - {{ $appliance->created_at }}
                                </button>
                            </td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    {{ $qrCode = QrCode::generate(route('application.show', ['id' => $appliance->id])) }}
                                    <p>Scan the QR code or click <a href="{{ route('application.show', ['id' => $appliance->id]) }}">here</a> to go to the destination page.</p>
                                    <p>Click <a href="{{ Storage::url($filename) }}">here</a> to download the QR code image.</p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

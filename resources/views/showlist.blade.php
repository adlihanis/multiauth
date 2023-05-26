@extends('layouts.bootstrap')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application List') }}
        </h2>
    </x-slot>

    <div class="container">
        <form action="{{ route('application.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control custom-search-input" placeholder="Search by name" value="{{ $search }}" required>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        @if ($search)
            <div class="mb-3">
                <a href="{{ route('application.showList') }}" class="btn btn-secondary">Clear Search</a>
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Entry</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appliances as $appliance)
                <tr>
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
</x-app-layout>

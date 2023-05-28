@extends('layouts.bootstrap')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADD ELECTRICAL APPLIANCES') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="card-header">{{ $appliance->user->name }} - {{ $appliance->created_at }}</div>
        <div class="table-responsive">
        @if ($appliance->approval_status === 'approved')
    <div class="d-flex flex-column align-items-center">
    <h1>Your QR Code</h1>
        <a href="{{ Storage::url($filename) }}" download>{{ $qrCode }}</a>
        <p>Click on the QR Code to save it</p>
    </div>
@endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Items</th>
                        <th>Quantity</th>
                        <th>Rate (RM/Semester)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('image/iron.png') }}" alt="Image 1" width="100">
                        </td>
                        <td>
                            IRON
                        </td>
                        <td>
                            {{ $appliance->quantity1 }}
                        </td>
                        <td>
                            <span id="rate1">10</span> <!-- Rate for Item 1 -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/electric kettle.png') }}" alt="Image 2" width="100">
                        </td>
                        <td>
                            ELECTRIC KETTLE
                        </td>
                        <td>
                            {{ $appliance->quantity2 }}
                        </td>
                        <td>
                            <span id="rate2">15</span> <!-- Rate for Item 2 -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/iron kettle.jpg') }}" alt="Image 3" width="100">
                        </td>
                        <td>
                            PACKAGE
                        </td>
                        <td>
                            {{ $appliance->quantity3 }}
                        </td>
                        <td>
                             <span id="rate3">10</span> <!-- Rate for Item 3 -->
                        </td>
                    </tr>
                    <!-- Add more table rows for additional images, names/titles, descriptions, quantities, prices, and statuses -->
                    <tr>
                        <td>
                            <img src="{{ asset('image/toaster.png') }}" alt="Image 4" width="100">
                        </td>
                        <td>
                            TOASTER
                        </td>
                        <td>
                            {{ $appliance->quantity4 }}
                        </td>
                        <td>
                            <span id="rate4">10</span> <!-- Rate for Item 4 -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/table fan.png') }}" alt="Image 5" width="100">
                        </td>
                        <td>
                            TABLE FAN
                        </td>
                        <td>
                           {{ $appliance->quantity5 }}
                        </td>
                        <td>
                            <span id="rate5">10</span> <!-- Rate for Item 5 -->
                         </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/hair dryer.png') }}" alt="Image 6" width="100">
                        </td>
                        <td>
                            HAIR DRYER
                        </td>
                        <td>
                            {{ $appliance->quantity6 }}
                        </td>
                        <td>
                            <span id="rate6">10</span> <!-- Rate for Item 6 -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/radio.png') }}" alt="Image 7" width="100">
                        </td>
                        <td>
                            RADIO
                        </td>
                        <td>
                            {{ $appliance->quantity7 }}
                        </td>
                        <td>
                            <span id="rate7">10</span> <!-- Rate for Item 7 -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/charger phone.png') }}" alt="Image 8" width="100">
                        </td>
                        <td>
                            CELLPHONE CHARGER
                        </td>
                        <td>
                            {{ $appliance->quantity8 }}
                        </td>
                        <td>
                            <span id="rate8">0</span> <!-- Rate for Item 8 -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/computer laptop.png') }}" alt="Image 9" width="100">
                        </td>
                        <td>
                            COMPUTER/LAPTOP
                        </td>
                        <td>
                            {{ $appliance->quantity9 }}
                        </td>
                        <td>
                            <span id="rate9">0</span> <!-- Rate for Item 9 -->
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong>Total Quantity:</strong>
                        </td>
                        <td colspan="2">
                            {{ $appliance->totalQuantity }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong>Total Price:</strong>
                        </td>
                        <td colspan="2">
                            {{ $appliance->totalPrice }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong>Status:</strong>
                        </td>
                        <td colspan="2">
                            @if ($appliance->approval_status === 'approved')
                                <span class="text-success">Approved</span>
                            @elseif ($appliance->approval_status === 'rejected')
                                <span class="text-danger">Rejected</span>
                            @else
                                <span class="text-muted">Pending Approval by Staff</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong>Action:</strong>
                        </td>
                        <td colspan="2">
                            @if ((Auth::user()->role == '2' || Auth::user()->role == '1') && $appliance->approval_status === 'pending')
                                <form method="POST" action="{{ route('approve', ['id' => $appliance->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('reject', ['id' => $appliance->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @endif
                            <br>
                            <form method="POST" action="{{ route('delete', ['id' => $appliance->id]) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

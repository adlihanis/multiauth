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
                @foreach($electrics as $index => $item)
                    <tr>
                        <td>
                            <img src="/image/{{ $item->image }}" alt='image' width=100>
                        </td>
                        <td>
                        {{ $item->item }}
                        </td>
                        <td>
                        
                        {{ $appliance->{"quantity" . ($index+1)} }}
                        
                        </td>
                        <td>
                            <span id="rate1">10</span> <!-- Rate for Item 1 -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
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
                            <strong>Payment Status:</strong>
                        </td>
                        <td colspan="2">
                        @if ($appliance->payment_status === 'successful')
                             <span class="text-success">Successful</span>
                        @elseif ($appliance->payment_status === 'pending')
                             <span class="text-warning">Pending</span>
                        @else
                             <span class="text-muted">Unknown</span>
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
                    @if (Auth::user()->role == '0')
                    <tr>
                        <td colspan="2">
                             <strong>Payment Link:</strong>
                        </td>
                        <td colspan="2">
                            <a href="{{ route('checkout', ['id' => $appliance->id]) }}">Proceed to Checkout</a>
                        </td>
                    </tr>
                    @endif
                </tfoot>
            </table>
        </div>
    </div>
</x-app-layout>

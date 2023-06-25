<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADD ELECTRICAL APPLIANCES') }}
        </h2>
    </x-slot>
    <div class="container-fluid bg mt-2">
        <title>KTDI | Register Appliances</title>
        @extends('layouts.bootstrap')
        @include('layouts.style')
        @extends('layouts.footer')
        @extends('layouts.bar')

        @section('content')
            <form id="createApplianceForm" action="{{url('/appliances')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="totalQuantity" id="totalQuantityInput">
                <input type="hidden" name="totalPrice" id="totalPriceInput">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Items</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Rate (RM/Semester)</th>
                            <th>Price (RM)</th>
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
                                {{ $item->description }}
                            </td>
                            <td>
                                <input type="number" name="quantity[]" class="form-control quantity-input" min="0" value="0">
                            </td>
                            <td>
                                <span class="rate">{{ $item->rate }}</span>
                            </td>
                            <td>
                                <span class="price">0</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td>
                                <strong>Total Quantity:</strong>
                            </td>
                            <td>
                                <span id="totalQuantity">0</span>
                            </td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td>
                                <strong>Total Price:</strong>
                            </td>
                            <td colspan="2">
                                <span id="totalPrice">0</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <div class="text-right">
                    <button type="button" class="btn btn-success" id="sendApproval">Send for Approval</button>
                </div>
            </form>
        </div>

        <script>
            function calculateTotal() {
                let totalQuantity = 0;
                let totalPrice = 0;
                const quantityInputs = document.querySelectorAll('.quantity-input');
                const priceSpans = document.querySelectorAll('.price');
                const rateSpans = document.querySelectorAll('.rate');

                quantityInputs.forEach((input, index) => {
                    const quantity = parseInt(input.value);
                    const rate = parseInt(rateSpans[index].innerText);
                    const price = quantity * rate;
                    priceSpans[index].innerText = price.toFixed(2);
                    totalQuantity += quantity;
                    totalPrice += price;
                });

                document.getElementById('totalQuantity').innerText = totalQuantity;
                document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
            }

            const quantityInputs = document.querySelectorAll('.quantity-input');
            quantityInputs.forEach(input => {
                input.addEventListener('change', calculateTotal);
            });

            const sendApprovalButton = document.getElementById('sendApproval');
            sendApprovalButton.addEventListener('click', function() {
                // Check if at least one quantity input has a value greater than 0
                let hasQuantity = false;
                quantityInputs.forEach(input => {
                    const quantity = parseInt(input.value);
                    if (quantity > 0) {
                        hasQuantity = true;
                        return;
                    }
                });

                // If no quantity is chosen, show an alert and prevent form submission
                if (!hasQuantity) {
                    alert('Please choose at least one quantity before submitting.');
                    return;
                }

                // Set the values of the hidden input fields
                document.getElementById('totalQuantityInput').value = document.getElementById('totalQuantity').innerText;
                document.getElementById('totalPriceInput').value = document.getElementById('totalPrice').innerText;

                document.getElementById('createApplianceForm').submit();
                // Perform the necessary logic to trigger the approval process
                alert('Please make payment in the Application List tab to proceed with the approval process');
            });

            calculateTotal();
        </script>
    </x-app-layout>

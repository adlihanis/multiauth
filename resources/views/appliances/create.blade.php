
@extends('layouts.bootstrap')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADD ELECTRICAL APPLIANCES') }}
        </h2>
    </x-slot>

    <!-- resources/views/appliances/create.blade.php -->

    <div class="container">

        <form id="createApplianceForm" action="/appliances" method="POST" enctype="multipart/form-data">
            @csrf

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name/Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Rate (RM/Semester)</th>
                        <th>Price (RM)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('images/image1.jpg') }}" alt="Image 1" width="100">
                        </td>
                        <td>
                            Item 1
                        </td>
                        <td>
                            Description for Item 1
                        </td>
                        <td>
                            <input type="number" name="quantity[1]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                            <span id="rate1">10</span> <!-- Rate for Item 1 -->
                        </td>
                        <td>
                        <span id="price1">0</span>
                        </td>
                        <td>
                            <span id="status1">Approved</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('images/image2.jpg') }}" alt="Image 2" width="100">
                        </td>
                        <td>
                            Item 2
                        </td>
                        <td>
                            Description for Item 2
                        </td>
                        <td>
                            <input type="number" name="quantity[2]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                            <span id="rate2">15</span> <!-- Rate for Item 2 -->
                        </td>
                        <td>
                        <span id="price2">0</span>
                        </td>
                        <td>
                            <span id="status2">Not Approved</span>
                        </td>
                    </tr>
                    <!-- Add more table rows for additional images, names/titles, descriptions, quantities, prices, and statuses -->
                    <tr>
                        <td>
                            <img src="{{ asset('images/image3.jpg') }}" alt="Image 3" width="100">
                        </td>
                        <td>
                            Item 3
                        </td>
                        <td>
                            Description for Item 3
                        </td>
                        <td>
                            <input type="number" name="quantity[3]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                             <span id="rate3">10</span> <!-- Rate for Item 3 -->
                        </td>
                        <td>
                            <span id="price3">0</span>
                        </td>
                        <td>
                            <span id="status3">Not Approved</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('images/image4.jpg') }}" alt="Image 4" width="100">
                        </td>
                        <td>
                            Item 4
                        </td>
                        <td>
                            Description for Item 4
                        </td>
                        <td>
                            <input type="number" name="quantity[4]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                            <span id="rate4">10</span> <!-- Rate for Item 4 -->
                        </td>
                        <td>
                            <span id="price4">0</span>
                        </td>
                        <td>
                            <span id="status4">Not Approved</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('images/image5.jpg') }}" alt="Image 5" width="100">
                        </td>
                        <td>
                            Item 5
                        </td>
                        <td>
                            Description for Item 5
                        </td>
                        <td>
                            <input type="number" name="quantity[5]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                            <span id="rate5">10</span> <!-- Rate for Item 5 -->
                         </td>
                        <td>
                            <span id="price5">0</span>
                        </td>
                        <td>
                            <span id="status5">Not Approved</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('images/image6.jpg') }}" alt="Image 6" width="100">
                        </td>
                        <td>
                            Item 6
                        </td>
                        <td>
                            Description for Item 6
                        </td>
                        <td>
                            <input type="number" name="quantity[6]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                            <span id="rate6">10</span> <!-- Rate for Item 6 -->
                        </td>
                        <td>
                            <span id="price6">0</span>
                        </td>
                        <td>
                            <span id="status6">Not Approved</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('images/image7.jpg') }}" alt="Image 7" width="100">
                        </td>
                        <td>
                            Item 7
                        </td>
                        <td>
                            Description for Item 7
                        </td>
                        <td>
                            <input type="number" name="quantity[7]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                            <span id="rate7">10</span> <!-- Rate for Item 7 -->
                        </td>
                        <td>
                            <span id="price7">0</span>
                        </td>
                        <td>
                            <span id="status7">Not Approved</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('images/image7.jpg') }}" alt="Image 7" width="100">
                        </td>
                        <td>
                            Item 8
                        </td>
                        <td>
                            Description for Item 8
                        </td>
                        <td>
                            <input type="number" name="quantity[8]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                            <span id="rate8">0</span> <!-- Rate for Item 8 -->
                        </td>
                        <td>
                            <span id="price8">0</span>
                        </td>
                        <td>
                            <span id="status8">Not Approved</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('images/image7.jpg') }}" alt="Image 7" width="100">
                        </td>
                        <td>
                            Item 9
                        </td>
                        <td>
                            Description for Item 9
                        </td>
                        <td>
                            <input type="number" name="quantity[9]" class="form-control" min="0" value="0">
                        </td>
                        <td>
                            <span id="rate9">0</span> <!-- Rate for Item 9 -->
                        </td>
                        <td>
                            <span id="price9">0</span>
                        </td>
                        <td>
                            <span id="status9">Not Approved</span>
                        </td>
                    </tr>
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
    const quantityInputs = document.querySelectorAll('input[name^="quantity"]');
    const priceSpans = document.querySelectorAll('span[id^="price"]');
    const statusSpans = document.querySelectorAll('span[id^="status"]');
    const rate1 = parseInt(document.getElementById('rate1').innerText);
    const rate2 = parseInt(document.getElementById('rate2').innerText);
    const rate3 = parseInt(document.getElementById('rate3').innerText);
    const rate4 = parseInt(document.getElementById('rate4').innerText);
    const rate5 = parseInt(document.getElementById('rate5').innerText);
    const rate6 = parseInt(document.getElementById('rate6').innerText);
    const rate7 = parseInt(document.getElementById('rate7').innerText);
    const rate8 = parseInt(document.getElementById('rate8').innerText);
    const rate9 = parseInt(document.getElementById('rate9').innerText);

    quantityInputs.forEach((input, index) => {
        const quantity = parseInt(input.value);
        let rate = 0;

        // Set the rate based on the item index
        if (index === 0) {
            rate = rate1; // Item 1 rate
        } else if (index === 1) {
            rate = rate2; // Item 2 rate
        } else if (index === 2) {
            rate = rate3; // Item 3 rate
        } else if (index === 3) {
            rate = rate4; // Item 4 rate
        } else if (index === 4) {
            rate = rate5; // Item 5 rate
        } else if (index === 5) {
            rate = rate6; // Item 6 rate
        } else if (index === 6) {
            rate = rate7; // Item 7 rate
        } else if (index === 7) {
            rate = rate8; // Item 8 rate
        } else if (index === 8) {
            rate = rate9; // Item 9 rate
        }

        const price = quantity * rate;
        priceSpans[index].innerText = price.toFixed(2);
        totalQuantity += quantity;
        totalPrice += price;

        // Update status based on your approval process logic
        if (quantity > 0) {
            statusSpans[index].innerText = 'Not Approved';
        } else {
            statusSpans[index].innerText = 'Approved';
        }
    });
    document.getElementById('totalQuantity').innerText = totalQuantity;
    document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
}

    const quantityInputs = document.querySelectorAll('input[name^="quantity"]');
    quantityInputs.forEach(input => {
        input.addEventListener('change', calculateTotal);
    });

    calculateTotal();

    const sendApprovalButton = document.getElementById('sendApproval');
    sendApprovalButton.addEventListener('click', function() {
        document.getElementById('createApplianceForm').submit();
        // Perform the necessary logic to trigger the approval process
        alert('Application sent for approval!');
    });
</script>
</x-app-layout>

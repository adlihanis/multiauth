
@extends('layouts.bootstrap')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADD ELECTRICAL APPLIANCES') }}
        </h2>
    </x-slot>

    <!-- resources/views/appliances/create.blade.php -->

    <div class="container">

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
                    <tr>
                        <td>
                            <img src="{{ asset('image/iron.png') }}" alt="Image 1" width="100">
                        </td>
                        <td>
                            IRON
                        </td>
                        <td>
                            You are advised to iron your clothes as much as possible at a time according to your convenience. The power used per usage equals to powering 24 bulbs of 100 watts.
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
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/electric kettle.png') }}" alt="Image 2" width="100">
                        </td>
                        <td>
                            ELECTRIC KETTLE
                        </td>
                        <td>
                            Only boil water when needed and adequately. Do not leave your room when boiling water to avoid reboiling the water.
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
                    </tr>
                    <!-- Add more table rows for additional images, names/titles, descriptions, quantities, prices, and statuses -->
                    <tr>
                        <td>
                            <img src="{{ asset('image/iron kettle.jpg') }}" alt="Image 3" width="100">
                        </td>
                        <td>
                            PACKAGE
                        </td>
                        <td>
                            Saving electricity is saving your money. Hence, we need to be smart in using electricity to ensure money is spent wisely.
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
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/toaster.png') }}" alt="Image 4" width="100">
                        </td>
                        <td>
                            TOASTER
                        </td>
                        <td>
                            Use toaster and not oven toaster to make toasts. Toaster uses lesser electricity and a cheaper alternative.
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
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/table fan.png') }}" alt="Image 5" width="100">
                        </td>
                        <td>
                            TABLE FAN
                        </td>
                        <td>
                            Don't use table fan and ceiling fans at a same time. Ceiling fans are considered the most effective of these types of fans, because they effectively circulate the air in a room.
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
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/hair dryer.png') }}" alt="Image 6" width="100">
                        </td>
                        <td>
                            HAIR DRYER
                        </td>
                        <td>
                            Drying your hair naturally, in the sun or while sleep saves 1500 watts of electricity.
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
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/radio.png') }}" alt="Image 7" width="100">
                        </td>
                        <td>
                            RADIO
                        </td>
                        <td>
                            Radios are almost irrelevant now with its function replaced by other gadgets.
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
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/charger phone.png') }}" alt="Image 8" width="100">
                        </td>
                        <td>
                            CELLPHONE CHARGER
                        </td>
                        <td>
                            Please ensure that cellphone charger are not switch on when not in user.
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
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('image/computer laptop.png') }}" alt="Image 9" width="100">
                        </td>
                        <td>
                            COMPUTER/LAPTOP
                        </td>
                        <td>
                            Laptop uses 50% less electricity than computers. The use of flat screen monitors are more electricity savvy than conventional computer monitors.
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
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <td>
                            <strong>Total Quantity:</strong>
                        </td>
                        <td>
                            <span id="totalQuantity" name="totalQuantity">0</span>
                        </td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>
                            <strong>Total Price:</strong>
                        </td>
                        <td colspan="2">
                            <span id="totalPrice" name = "totalPrice">0</span>
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
    // Set the values of the hidden input fields
    document.getElementById('totalQuantityInput').value = document.getElementById('totalQuantity').innerText;
    document.getElementById('totalPriceInput').value = document.getElementById('totalPrice').innerText;

    document.getElementById('createApplianceForm').submit();
    // Perform the necessary logic to trigger the approval process
    alert('Please make payment in the Application List tab to proceed with the approval process');
});
</script>
</x-app-layout>

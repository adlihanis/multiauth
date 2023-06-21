@extends('layouts.bootstrap')

<style>
  .green-text {
    color: green;
  }
</style>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <div class="card" style="width: 24rem;">
    <div class="card-body">
      <h5 class="card-title mb-4" style="display: flex; justify-content: center; align-items: center;">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="40" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
        </svg>
      </h5>
      <h6 class="card-subtitle mb-4 text-body-secondary" style="display: flex; justify-content: center;">Payment Success!</h6>
      <h5 style="display: flex; justify-content: center;">RM{{ $appliance->totalPrice }}</h5>
      <div class="text-center">
        <img src="{{ asset('image/pay.png') }}" width="150" height="100" alt="...">
      </div>
      <hr style="border-top: 1px solid #000000;">
      <table style="width: 100%;">
        <tr>
          <th>Payment Status</th>
          <td class="green-text">{{ $appliance->payment_status }}</td>
        </tr>
        <tr>
          <th>Payment Time</th>
          <td>{{ $appliance->payment_time }}</td>
        </tr>
      </table>
      <div style="display: flex; justify-content: center; margin-top: 20px;">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Done</a>
      </div>
    </div>
  </div>
</div>

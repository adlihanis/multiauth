@extends('layouts.design')
@section('content')
 
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Image : {{ $electrics->image }}</h5>
        <p class="card-text">Item Name : {{ $electrics->item }}</p>
        <p class="card-text">Description : {{ $electrics->description }}</p>
        <p class="card-text">Rate : {{ $electrics->rate }}</p>
  </div>
       
    </hr>
  
  </div>
</div>
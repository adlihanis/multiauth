@extends('layouts.design')
@section('content')
 
<div class="card">
  <div class="card-header">Electric Appliance Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('electric/' .$electrics->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$electrics->id}}" id="id" />
        <label>Image</label></br>
        <input type="file" name="image" id="image" value="{{$electrics->image}}" class="form-control"></br>
        <label>Item Name</label></br>
        <input type="text" name="item" id="item" value="{{$electrics->item}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$electrics->description}}" class="form-control"></br>
        <label>Rate</label></br>
        <input type="number" name="rate" id="rate" value="{{$electrics->rate}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
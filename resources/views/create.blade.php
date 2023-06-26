@extends('layouts.design')
@section('content')

<div class="card">
  <div class="card-header">Add, Update Electrical Appliance</div>
  <div class="card-body">

    <form action="{{ url('electric') }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <label>Image</label><br>
      <input type="file" name="image" id="image" class="form-control"><br>
      <label>Item Name</label><br>
      <input type="text" name="item" id="item" class="form-control"><br>
      <label>Description</label><br>
      <input type="text" name="description" id="description" class="form-control"><br>
      <label>Rate</label><br>
      <input type="number" name="rate" id="rate" class="form-control"><br>
      <input type="submit" value="Save" class="btn btn-success">
      <a href="{{ url('/newElectric') }}" class="btn btn-secondary">Back</a>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

  </div>
</div>

@stop

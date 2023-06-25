@extends('layouts.design')
@section('content')

<div class="card">
  <div class="card-header">Electric Appliance Edit Page</div>
  <div class="card-body">

    <form action="{{ url('electric/' .$electrics->id) }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" id="id" value="{{$electrics->id}}" />
      <label>Image</label><br>
      <input type="file" name="image" id="image" class="form-control"><br>
      @if ($errors->has('image'))
        <span class="text-danger">{{ $errors->first('image') }}</span><br>
      @endif
      <label>Item Name</label><br>
      <input type="text" name="item" id="item" value="{{$electrics->item}}" class="form-control"><br>
      @if ($errors->has('item'))
        <span class="text-danger">{{ $errors->first('item') }}</span><br>
      @endif
      <label>Description</label><br>
      <input type="text" name="description" id="description" value="{{$electrics->description}}" class="form-control"><br>
      @if ($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span><br>
      @endif
      <label>Rate</label><br>
      <input type="number" name="rate" id="rate" value="{{$electrics->rate}}" class="form-control"><br>
      @if ($errors->has('rate'))
        <span class="text-danger">{{ $errors->first('rate') }}</span><br>
      @endif
      <input type="submit" value="Update" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop

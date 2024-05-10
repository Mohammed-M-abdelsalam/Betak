@extends('admin.layout')
@section('body')

<h1 class="text-center mt-5">Add Image</h1>

<div class="container my-5 mx-auto w-75">
    <form action="{{route("images.store", $property->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Add Image</label>
            <input class="form-control" name="img" type="file" id="formFile">
          </div>


    <div class="form-group">
        <h4 style="display: inline">Size: </h4> {{$property->size}} <br>
        <h4 style="display: inline">price: </h4> {{$property->price}} <br>
        <h4 style="display: inline">description: </h4> {{$property->description}} <br>
        <h4 style="display: inline">location_link: </h4> {{$property->location_link}} <br>
        <h4 style="display: inline">category: </h4> {{$property->category->name}} <br>
        <h4 style="display: inline">agent: </h4> {{$property->agent->name}} <br>
        <h4 style="display: inline">city: </h4> {{$property->location->name}} <br>
    </div>

    <div class="my-5">
        <button class="btn btn-dark">Add Image</button>
    </div>
</form>
</div>


@endsection
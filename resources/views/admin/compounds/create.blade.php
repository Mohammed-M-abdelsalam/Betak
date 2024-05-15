@extends('admin.layout')
@section('body')
<h1 class="text-center mt-5">{{__("message.new compound")}}</h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{Route("admin.compounds.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="col-form-label">{{__("message.name")}}</label>
            <input type="text" class="form-control"  name="name"/> <br>

        <div class="mb-3">
            <label for="formFile" class="form-label">Add Image</label>
            <input class="form-control" name="img" type="file" id="formFile">
        </div>


            <select name="location" id="">
                @foreach ($locations as $location)
                    <option value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
            </select>
        </div>
    <button type="submit" class="mt-4 m-2 btn btn-dark">{{__("message.add compound")}}</button>
    </form>
</div>
<!-- Form End  -->
@endsection


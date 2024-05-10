@extends('admin.layout')
@section('body')
<h1 class="text-center mt-5">New Compound</h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{Route("compounds.update", $compound->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="form-group">
            <label class="col-form-label">name</label>
            <input type="text" class="form-control"  name="name" value="{{$compound->name}}"/> <br>

            <div class="mb-3">
                <label for="formFile" class="form-label">Add Image</label>
                <input class="form-control" name="img" type="file" id="formFile">
            </div>

            <select name="location" id="">
                <option value="{{$compound->location->id}}">{{$compound->location->name}}</option>
                @foreach ($locations as $location)
                    @if ($location->id == $compound->location->id)
                        @continue
                    @endif
                    <option value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
            </select>
        </div>
    <button type="submit" class="mt-4 m-2 btn btn-dark">{{ __("message.edit compound") }}</button>
    </form>
</div>
<!-- Form End  -->
@endsection



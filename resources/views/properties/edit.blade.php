@extends('admin.layout')

@section('body')
<h1 class="text-center mt-5">Change Property</h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{route("properties.update", $property->id)}}" method="post">
        @csrf
        @method("put")
        <div class="form-group">
            <label class="col-form-label">{{__("message.size")}}</label>
            <input type="text" class="form-control"  name="size" value="{{$property->size}}"/>
            <span class="text-danger p-3 m-3" ></span>
        </div>
        <div class="form-group">
            <label class="col-form-label" >{{__("message.price")}}</label>
            <input type="text" class="form-control" name="price" value="{{$property->price}}"/>
            <span class="text-danger p-3 m-3" ></span>
        </div>
        <div class="form-group">
            <label class="col-form-label">{{__("message.description en")}}</label>
            <textarea class="form-control" name="description_en" id="" cols="30" rows="5">{{$property->description_en}}</textarea>
            <span class="text-danger p-3 m-3" ></span>
        </div>
        <div class="form-group">
            <label class="col-form-label">{{__("message.description ar")}}</label>
            <textarea class="form-control" name="description_ar" id="" cols="30" rows="5">{{$property->description_ar}}</textarea>
            <span class="text-danger p-3 m-3" ></span>
        </div>
        <div class="form-group">
            <label class="col-form-label" >bedrooms</label>
            <input type="text" class="form-control" name="bedrooms" value="{{$property->bedrooms}}" />
            <span class="text-danger p-3 m-3" ></span>
        </div>
        <div class="form-group">
            <label class="col-form-label" >location_link</label>
            <input type="text" class="form-control" name="location_link" value="{{$property->location_link}}" />
            <span class="text-danger p-3 m-3" ></span>
        </div>

        <select name="category" id="">
            <option value="{{$property->category->id}}">{{$property->category->name}}</option>
            @foreach ($categories as $category)
            @if ($category->id == $property->category->id)
            @continue
            @endif
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <select name="compound" id="">
            @foreach ($compounds as $compound)
            <option value="{{$compound->id}}">{{$compound->name}}</option>
            @endforeach
        </select>

        <select name="agent" id="">
            <option value="{{$property->agent->id}}">{{$property->agent->name}}</option>
            @foreach ($agents as $agent)
            @if ($agent->id == $property->agent->id)
            @continue
            @endif
            <option value="{{$agent->id}}">{{$agent->name}}</option>
            @endforeach
        </select>

        <select name="location" id="">
            <option value="{{$property->location->id}}">{{$property->location->name}}</option>
            @foreach ($locations as $location)
                @if ($location->id == $property->location->id)
                    @continue
                @endif
                <option value="{{$location->id}}">{{$location->name}}</option>
            @endforeach
        </select> <br>
        <button class="mt-4 m-2 btn btn-dark"> {{__("message.edit property")}} </button>
    </form>
</div>
<!-- Form End  -->
@endsection
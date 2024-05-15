@extends('admin.layout')

@section('body')
<h1 class="text-center mt-5"> {{__("message.new property")}} </h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{route("admin.properties.store")}}" method="post">
        @csrf
    <div class="form-group">
        <label class="col-form-label"> {{__("message.size")}} </label>
        <input type="text" class="form-control"  name="size" value="{{old("size")}}"/>
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label"> {{__("message.price")}}  </label>
        <input type="text" class="form-control" name="price" value="{{old("price")}}"/>
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label"> {{__("message.description en")}} </label>
        <textarea class="form-control" name="description_en" id="" cols="30" rows="5">{{old("description_en")}}</textarea>
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label"> {{__("message.description ar")}} </label>
        <textarea class="form-control" name="description_ar" id="" cols="30" rows="5">{{old("description_ar")}}</textarea>
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label" > {{__("message.bedrooms")}} </label>
        <input type="text" class="form-control" name="bedrooms" value="{{old("bedrooms")}}" />
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label" >{{__("message.location link")}} </label>
        <input type="text" class="form-control" name="location_link" value="{{old("location_link")}}" />
        <span class="text-danger p-3 m-3" ></span>
    </div>

    <select name="category" id="">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <select name="compound" id="">
        @foreach ($compounds as $compound)
        <option value="{{$compound->id}}">{{$compound->name}}</option>
        @endforeach
    </select>
    <select name="agent" id="">
        @foreach ($agents as $agent)
            <option value="{{$agent->id}}">{{$agent->name}}</option>
            @endforeach
        </select>
        <button class="mt-4 m-2 btn btn-dark">Add Property</button>
    </form>
</div>
<!-- Form End  -->
@endsection
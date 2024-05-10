@extends('admin.layout')
@section('body')
<h1 class="text-center mt-5">{{__("message.new location")}}</h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{Route("locations.store")}}" method="post">
        @csrf
    <div class="form-group">
        <label class="col-form-label">{{__("message.name")}}</label>
        <input  type="text" class="form-control"  name="name"/> <br>
        <label class="col-form-label">{{__("message.description en")}}</label>
        <textarea class="form-control" name="description_en" id="" cols="30" rows="5">{{old("description")}}</textarea>
        <label class="col-form-label">{{__("message.description ar")}}</label>
        <textarea class="form-control" name="description_ar" id="" cols="30" rows="5">{{old("description")}}</textarea>
    </div>
    <button type="submit" class="mt-4 m-2 btn btn-dark"> {{__("message.add location")}} </button>
    </form>
</div>
<!-- Form End  -->
@endsection
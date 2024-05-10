@extends('admin.layout')
@section('body')
<h1 class="text-center mt-5">{{__("message.add category")}}</h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{Route("categories.store")}}" method="post">
        @csrf
    <div class="form-group">
        <label class="col-form-label">{{__("message.name")}}</label>
        <input type="text" class="form-control"  name="name"/>
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <button type="submit" class="mt-4 m-2 btn btn-dark">{{__("message.add category")}}</button>
    </form>
</div>
<!-- Form End  -->
@endsection

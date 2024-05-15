@extends('admin.layout')
@section('body')
<h1 class="text-center mt-5"> {{ __("message.new agent") }} </h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{route("admin.agents.store")}}" method="post">
        @csrf
    <div class="form-group">
        <label class="col-form-label"> {{__("message.name")}} </label>
        <input type="text" class="form-control"  name="name"/>
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label">{{__("message.email")}}</label>
        <input type="email" class="form-control"  name="email"/>
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label">{{__("message.phone")}}</label>
        <input type="phone" class="form-control"  name="phone"/>
        <span class="text-danger p-3 m-3" ></span>
    </div>

    <button class="mt-4 m-2 btn btn-dark">{{__("message.add agent")}}</button>
    </form>
</div>
<!-- Form End  -->
@endsection
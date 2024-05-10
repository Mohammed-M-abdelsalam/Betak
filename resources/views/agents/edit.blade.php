@extends('admin.layout')
@section('body')
<h1 class="text-center mt-5">Change Agent</h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{route("agents.update", $agent->id)}}" method="post">
        @csrf
        @method("put")
    <div class="form-group">
        <label class="col-form-label">name</label>
        <input type="text" class="form-control"  name="name" value="{{$agent->name}}" />
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label">email</label>
        <input type="email" class="form-control" value="{{$agent->email}}"  name="email"/>
        <span class="text-danger p-3 m-3" ></span>
    </div>
    <div class="form-group">
        <label class="col-form-label">phone</label>
        <input type="phone" class="form-control" value="{{$agent->phone}}"   name="phone"/>
        <span class="text-danger p-3 m-3" ></span>
    </div>

    <button type="sbmit" class="mt-4 m-2 btn btn-dark"> {{__("message.edit agent")}} </button>
    </form>
</div>
<!-- Form End  -->
@endsection
@extends('admin.layout')
@section('body')
<h1 class="text-center mt-5">New Category</h1>
<!-- From  Start -->
<div class="container w-75 my-5">
    <form action="{{Route("categories.update", $category->id)}}" method="post">
        @csrf
        @method("put")
        <div class="form-group">
            <label class="col-form-label">name</label>
            <input type="text" class="form-control"  name="name" value="{{$category->name}}"/> <br>
        </div>
    <button type="submit" class="mt-4 m-2 btn btn-dark"> {{__("message.edit category")}} </button>
    </form>
</div>
<!-- Form End  -->
@endsection

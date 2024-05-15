@extends('admin.layout')
@section('body')
<div class="container w-75">


    <h1 class="text-center mt-5">{{__("message.categories")}}</h1>


<br />

<div class="m-4 mx-auto my-5">
    <form action="{{Route("admin.categories.create")}}" method="get" class="row offset-2" asp-action="Index">
        <div class="col-3">
            <button class="btn add-btn" type="submit" value="Search">{{__("message.add")}}</button>
        </div>
    </form>
</div>

<table class="table table-striped-columns table-striped table-hover">
    <thaed>
        <tr class="m-row">
            <td>{{__("message.name")}}</td>
            <td></td>
        </tr>
    </thaed>
    <tbody>
        @foreach ($categories as $category)
        <tr class="my-auto">
            <td>{{$category->name}}</td>
            <td></td>
            </tr>
            <td>
            <form  class="text-danger" action="{{route("admin.categories.edit", $category->id)}}" method="get">
                @csrf
                <button type="submit" class="text-warning" style="border:none"><i class="fas fa-edit"></i></button>
            </form>
            </td>
            <td>
                <form  class="text-danger" action="{{route("admin.categories.destroy", $category->id)}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="text-danger" style="border:none"><i class="fas fa-trash" ></i></button>
                </form>
            </td>
            @endforeach
        </tbody>
    </table>
@endsection




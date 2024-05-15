@extends('admin.layout')
@section('body')
<div class="container w-75">


<h1 class="text-center mt-5">{{__("message.compounds")}}</h1>


<br />

<div class="m-4 mx-auto my-5">
    <form action="{{Route("admin.compounds.create")}}" method="get" class="row offset-2" asp-action="Index">
        <div class="col-3">
            <button class="btn add-btn" type="submit" value="Search"> {{__("message.add")}} </button>
        </div>
    </form>
</div>

<table class="table table-striped-columns table-striped table-hover">
    <thaed>
        <tr class="m-row">
                <td> {{__("message.img")}} </td>
                <td> {{__("message.name")}} </td>
                <td> {{__("message.location")}} </td>
        </tr>
    </thaed>
        <tbody>
            @foreach ($compounds as $compound)
            <tr class="my-auto">
                <td> <img class="rounded-circle" src="{{asset("storage/$compound->img")}}" style="width: 40px; height:40px" alt=""></td>
                <td>{{$compound->name}}</td>
                <td>{{$compound->location->name}}</td>
            </tr>
            <td>
            <form  class="text-danger" action="{{route("admin.compounds.edit", $compound->id)}}" method="get">
                @csrf
                <button class="text-warning" style="border:none"><i class="fas fa-edit"></i></button>
            </form>
            </td>
            <td>
                <form  class="text-danger" action="{{route("admin.compounds.destroy", $compound->id)}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="text-danger" style="border:none"><i class="fas fa-trash" ></i></button>
                </form>
            </td>
            @endforeach
        </tbody>
    </table>
@endsection



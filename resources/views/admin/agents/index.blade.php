@extends('admin.layout')
@section('body')
<div class="container w-75">


    <h1 class="text-center mt-5">{{__("message.agents")}}</h1>


    <!-- searchBar Start -->
<br />

<div class="m-4 mx-auto my-5">
    <form action="{{Route("admin.agents.create")}}" method="get" class="row offset-2" asp-action="Index">
        <div class="col-3">
            <button class="btn add-btn" type="submit" value="Search"> {{ __("message.add") }} </button>
        </div>
    </form>
</div>
  <!-- searchBar End -->

<table class="table table-striped-columns table-striped table-hover">
    <thaed>
        <tr class="m-row">
            <td> {{__("message.name")}} </td>
            <td> {{__("message.email")}} </td>
            <td> {{__("message.phone")}} </td>
        </tr>
    </thaed>
        <tbody>
            @foreach ($agents as $agent)
            <tr class="my-auto">
                <td>{{$agent->name}}</td>
                <td>{{Str::substr($agent->email, 0, 8)}}...</td>
                <td>{{$agent->phone}}</td>
            </tr>
            <td>
            <form  class="text-danger" action="{{route("admin.agents.edit", $agent->id)}}" method="get">
                @csrf
                <button class="text-warning" style="border:none"><i class="fas fa-edit"></i></button>
            </form>
            </td>
            <td>
                <form  class="text-danger" action="{{route("admin.agents.destroy", $agent->id)}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="text-danger" style="border:none"><i class="fas fa-trash" ></i></button>
                </form>
            </td>
            @endforeach
        </tbody>
    </table>
@endsection

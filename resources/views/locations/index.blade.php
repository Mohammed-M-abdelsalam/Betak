@extends('admin.layout')
@section('body')
<div class="container w-75">


<h1 class="text-center mt-5">{{__("message.locations")}}</h1>


<br />

<div class="m-4 mx-auto my-5">
    <form action="{{Route("locations.create")}}" method="get" class="row offset-2" asp-action="Index">
        <div class="col-3">
            <button class="btn add-btn" type="submit" value="Search">{{ __("message.add") }}</button>
        </div>
    </form>
</div>


<table class="table table-striped-columns table-striped table-hover">
    <thaed>
        <tr class="m-row">
                <td>{{ __("message.name") }}</td>
                <td>{{ __("message.details") }}</td>
                <td>{{ __("message.top compound") }}</td>
        </tr>
    </thaed>
        <tbody>
            @foreach ($locations as $location)
            <tr class="my-auto">
                <td>{{$location->name}}</td>
                <td> {{Str::substr($location->$description, 0, 15)}}...</td>
                <td>
                @foreach ($location->compounds as $compound)
                    <ul style="display: inline">
                        <li>{{$compound->name}}
                            <form style="display: inline" action="{{route("compounds.destroy", $compound->id)}}" method="post">
                                @csrf
                                @method("delete")
                                <button class="text-danger" style="border:none"  type="submit" >{{ __("message.delete") }}</button>
                            </form> <br>
                        </li>
                    </ul>
                @endforeach
                </td>
            </tr>
            <td>
            <form  class="text-danger" action="{{route("locations.edit", $location->id)}}" method="get">
                @csrf
                <button class="text-warning" style="border:none"><i class="fas fa-edit"></i></button>
            </form>
            </td>
            <td>
                <form  class="text-danger" action="{{route("locations.destroy", $location->id)}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="text-danger" style="border:none"><i class="fas fa-trash" ></i></button>
                </form>
            </td>
            @endforeach
        </tbody>
    </table>
@endsection


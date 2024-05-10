@extends('admin.layout')
@section('body')
<div class="container w-75">


<h1 class="text-center mt-5"> {{ __("message.all properties") }} </h1>


<br/>

<div class="m-4 mx-auto my-5">
    <form action="{{Route("properties.create")}}" method="get" class="row offset-2" asp-action="Index">
        <div class="col-3">
            <button class="btn add-btn" type="submit" value="Search">{{ __("message.add") }}</button>
        </div>
    </form>
</div>

<table class="table table-striped-columns table-striped table-hover">
    <thaed>
        <tr class="m-row">
            <td>{{__("message.img")}}</td>
            <td>{{__("message.size")}}</td>
            <td>{{__("message.price")}}</td>
            <td>{{__("message.city")}}</td>
        </tr>
    </thaed>
    @foreach ($properties as $property)
        <tr class="my-auto">
            <td>
                @foreach ($property->image as $img)
                    <img class="rounded-circle" style="width: 50px;height: 50px;" src="{{asset("storage/$img->img")}}" alt="pic">
                @break
                @endforeach
            </td>
            <td>{{$property->size}}</td>
            <td>{{number_format($property->price)}}</td>
            <td>{{$property->location->name}}</td>

            </tr>
            <tr>
                <td><a  class="text-info" href="{{route("properties.show", $property->id)}}"><i class="fas fa-eye " ></i> <span class="actions">Show</span> </a></td>
                <td>
                    <form  class="text-warning" action="{{route("properties.edit", $property->id)}}" method="get">
                        @csrf
                        <button class="text-warning" style="border:none"><i class="fas fa-edit"></i> <span class="actions">Edit</span></button>
                    </form>
                </td>

                <td>
                    <form  class="text-danger" action="{{route("properties.destroy", $property->id)}}" method="post">
                        @csrf
                        @method("delete")
                        <button class="text-danger" style="border:none"><i class="fas fa-trash" ></i> <span class="actions">Delete</span></button>
                    </form>
                </td>

                <td>
                    <form  class="text-danger" action="{{route("images.create", $property->id)}}" method="get">
                        @csrf
                        <button class="add-img" style="border:none"> {{ __("message.add img") }} </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
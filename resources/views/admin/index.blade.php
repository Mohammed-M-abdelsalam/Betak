@extends('admin.layout')
@section('body')
<div class="container w-75">





<div class="m-4 mx-auto my-5">
    <h1 class="text-center mt-5"> {{__("message.all properties")}} </h1>
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
            <td>{{$property->price}}</td>
            <td>{{$property->location->name}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@extends('admin.layout')

@section('body')

<div class="card">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($property->image as $img)
            @if ($loop->first)
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset("storage/$img->img")}}" alt="First slide">
            </div>
            @else
            <div class="carousel-item">
                <img  src="{{asset("storage/$img->img")}}" class="d-block w-100" alt="pic">
            </div>
            @endif
            @endforeach
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    </div>

<div>
    <div>
        <div class="form">
            @foreach ($property->image as $img)
            <form style="text-align:center" action="{{route("admin.images.destroy", $img->id)}}" method="post">
                @csrf
                @method("delete")
                <div>
                    <button style="display: block" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->iteration - 1}}" class="active" aria-current="true" aria-label="Slide {{$loop->iteration}}">
                        <img style="width: 50px; height: 50px; border-radius:10px" src="{{asset("storage/$img->img")}}" alt=""> <br>
                    </button>
                    <button class="">{{__("message.delete")}}</button>
                </div>
            </form>
            @endforeach
        </div>
        <br>
    </div>

    <div class="card-content">
        <p >{{__("message.size")}}: <span dir="ltr"> {{$property->size}} m<sup>2</sup></span></p>
        <p>{{__("message.price")}}: {{number_format($property->price)}}</p>
        <p>{{__("message.bedrooms")}}: {{$property->bedrooms}} </p>
        <a href="{{$property->location_link}}">location</a>
        <p>{{__("message.location")}}: {{$property->location->name}} </p>
        <p>{{__("message.category")}}: {{$property->category->name}} </p>
        <p>{{__("message.compound")}}: {{$property->compound->name}} </p>
        <p>{{__("message.agent")}}: {{$property->agent->name}} </p>
        <p>{{__("message.description")}}: <span class="desc">{{$property->$description}}</span></p>
    </div>
  </div>

</div>
@endsection
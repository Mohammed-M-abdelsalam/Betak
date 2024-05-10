{{$compound->name}}
<hr>
<hr>
<hr>
@foreach ($compound->property as $property)
    {{$property->size}} <br>
    {{number_format($property->price)}} <br>
    {{$property->bedrooms}} <br>
    {{$property->size}} <br>
    {{$property->location->name}} <br>
    {{$property->agent->name}} <br>
    <a href="{{route("properties.show", $property->id)}}">show</a>
    <hr>
@endforeach
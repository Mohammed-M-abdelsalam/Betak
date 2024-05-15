<a href="{{url("location/$location->id")}}">ALL</a>
@foreach ($categories as $category)
<a href="{{url("location/$location->id/$category->id")}}">{{$category->name}}</a>
@endforeach
<br>

{{$location->name}} <br>

@foreach ($properties as $property)
    {{$property->price}}
    <a href="{{route("properties.compare", [$property->id, "location"])}}">compare</a>
    <br>
@endforeach

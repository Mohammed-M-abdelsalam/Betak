compounds: {{$count}} <br> <hr>

@foreach ($results as $compound)
    {{$compound->id}} <br>
    {{$compound->name}} <br>
    {{$compound->location->name}} <br>
    <a href="{{route("properties.search", $compound->id)}}">show</a>
    <hr>
@endforeach
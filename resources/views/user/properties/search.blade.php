Units: {{$count}} <br> <hr>

@foreach ($results as $property)

    {{$property->id}} <br>
    {{$property->location->name}} <br>
    {{$property->price}} <br>
    {{$property->size}} <br>
    {{$property->description_en}} <br>
    {{$property->compound->name}} <br>
    <hr>

@endforeach

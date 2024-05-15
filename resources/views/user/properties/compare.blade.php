@empty(!$first)
    {{$first->price}} <br>
    {{$first->size}} <br>
@endempty
<br>
@empty(!$secound)
    {{$secound->price}} <br>
    {{$secound->size}} <br>
@endempty
<hr>

@foreach ($properties as $property)
    @foreach ($property as $property)
        @if ($property->id != $first->id)
            {{ $property->price }}
            {{ $property->compound->name }}
            {{ $property->location->name }}
            <a href="{{url("compare/$first->id/location/$property->id")}}">add</a>
            <br>
        @endif
    @endforeach
@endforeach
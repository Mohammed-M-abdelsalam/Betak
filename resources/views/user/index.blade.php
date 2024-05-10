@foreach ($compounds as $compound)

{{$compound->name}} <br>
{{$compound->location->name}} <br>
{{$properties_num[$loop->iteration-1]}} <br>
<a href="{{route("compound.show", $compound->id)}}">show</a>

<hr>

@endforeach
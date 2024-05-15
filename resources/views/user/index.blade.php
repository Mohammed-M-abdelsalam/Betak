<form action="{{route("compounds.search")}}" method="get">
    @csrf
    <input type="text" name="search_text" placeholder="Area or Compound">
    <select name="bedroom" id="">
        @foreach ($bedrooms as $bedroom)
            <option value="{{$bedroom}}"> {{$bedroom}} </option>
        @endforeach
    </select>
    <select name="category" id="">
        @foreach ($categories as $category)
            <option value="{{$category->id}}"> {{$category->name}} </option>
        @endforeach
    </select>
    <button type="submit">Search</button>
</form>

@foreach ($locations as $location)
    {{$location->name}} <br>
    {{$properties_num[$loop->iteration-1]}} <br>
    <a href="{{route("locations.show", $location->id)}}">show</a> <br>
    <hr>
@endforeach

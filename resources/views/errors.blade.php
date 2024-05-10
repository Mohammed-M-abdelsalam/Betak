@if ($errors->any())
    @foreach ($errors->all(); as $error)
    <div class="btn-danger"> {{$error}}</div><br>
    @endforeach
@endif
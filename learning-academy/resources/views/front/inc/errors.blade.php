@if($errors->any())
<ul class="list-unstyle alert alert-danger">
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach

</ul>
@endif

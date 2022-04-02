@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between">
<h6>Categories / Add new </h6>
<a class="btn btn-sm btn-primary" href="{{ route('admin.cat.index') }}">back</a>
</div>
@include('admin.inc.errors')
<form action="{{ route('admin.cat.update', ['id'=>$id]) }}" method="post">
    @csrf
    <div class="form-group">
<label for="">Name</label>
<input type="text" name="name" class="form-control" id="" value="{{ $name }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

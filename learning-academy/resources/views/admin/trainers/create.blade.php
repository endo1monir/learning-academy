@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between">
        <h6>Categories / Add new </h6>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.trainer.index') }}">Back</a>
    </div>
    @include('admin.inc.errors')
    <form method="post" action="{{ route('admin.trainer.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">phone</label>
            <input type="text" name="phone" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Speciality</label>
            <input type="text" name="spec" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">img</label>
            <input type="file" name="img" class="form-control-file" id="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

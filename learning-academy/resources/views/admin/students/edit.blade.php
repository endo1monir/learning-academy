@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between">
    <h6>Students / Add new </h6>
    <a class="btn btn-sm btn-primary" href="{{ route('admin.students.index') }}">back</a>
    </div>
    @include('admin.inc.errors')
    <form action="{{ route('admin.students.update', ['id'=>$student->id]) }}" method="post">
        @csrf
        <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" id="" value="{{ $student->name }}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" id="" value="{{ $student->email }}">
                </div>
                <div class="form-group">
                    <label for="">Speciality</label>
                    <input type="text" name="spec" class="form-control" id="" value="{{ $student->spec }}">
                        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between">
    <h6>Students / Add new </h6>
    <a class="btn btn-sm btn-primary" href="{{ route('admin.students.index') }}">back</a>
    </div>
    @include('admin.inc.errors')
    <form action="{{ route('admin.students.assign', ['id'=>$student_id]) }}" method="post">
        @csrf
        <div class="form-group">
            <select name="cources" class="form-select m-5" aria-label="Default select example">
                @foreach ($cources as $cource)

                        <option value="{{ $cource->id }}">{{ $cource->name }}</option>

                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

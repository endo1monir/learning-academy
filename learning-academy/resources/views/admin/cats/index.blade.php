@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between">
    <h6>Categories</h6>
<a class="btn btn-sm btn-primary" href="{{ route('admin.cat.create', ['id'=>1]) }}">Add New</a>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($cats as $cat)
<tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $cat->name }}</td>
        <td>
            <a href="{{ route('admin.cat.edit', ['id'=>$cat->id]) }}" class="btn btn-sm btn-info">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{ route('admin.cat.delete', ['id'=>$cat->id]) }}">Delete</a>
        </td>

      </tr>
    @endforeach


    </tbody>
  </table>
@endsection

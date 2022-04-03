@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between">
    <h6>Categories</h6>
<a class="btn btn-sm btn-primary" href="{{ route('admin.trainer.create', ['id'=>1]) }}">Add New</a>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">img</th>
        <th scope="col">Name</th>
        <th scope="col">phone</th>
        <th scope="col">Speciality</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($trainers as $trainer)
<tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>
            <img src="{{ asset('uploads/trainers/'.$trainer->img) }}" alt="">
        </td>
        <td>{{ $trainer->name }} </td>
        <td>

            {{ $trainer->phone?? 'not exist' }}
         </td>
         <td>{{ $trainer->spec }} </td>
        <td>
            <a href="{{ route('admin.trainer.edit', ['id'=>$trainer->id]) }}" class="btn btn-sm btn-info">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{ route('admin.trainer.delete', ['id'=>$trainer->id]) }}">Delete</a>
        </td>

      </tr>
    @endforeach


    </tbody>
  </table>
@endsection

@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between">
    <h6>Students</h6>
<a class="btn btn-sm btn-primary" href="{{ route('admin.students.create') }}">Add New</a>


</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Spec</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($students as $t)
<tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>
            {{ $t->name }}
        </td>
        <td>{{ $t->email }} </td>
        <td>
            {{ $t->spec }}
         </td>

        <td>
            <a href="{{ route('admin.students.edit', ['id'=>$t->id]) }}" class="btn btn-sm btn-info">Edit</a>
            <a href="{{ route('admin.students.showCources', ['id'=>$t->id]) }}" class="btn btn-sm btn-success">Show Cources</a>
            <a class="btn btn-sm btn-danger" href="{{ route('admin.students.delete', ['id'=>$t->id]) }}">Delete</a>
        </td>

      </tr>
    @endforeach


    </tbody>
  </table>
{!! $students->render() !!}
  @endsection

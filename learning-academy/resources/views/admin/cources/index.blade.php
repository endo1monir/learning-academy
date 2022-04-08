@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between">
    <h6>Cources</h6>
<a class="btn btn-sm btn-primary" href="{{ route('admin.cources.create', ['id'=>1]) }}">Add New</a>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">img</th>
        <th scope="col">Name</th>
        <th scope="col">Prices</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($cources as $c)
<tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>
            <img width="50" height="50" src="{{ asset('uploads/cources/'.$c->img) }}" alt="">
        </td>
        <td>{{ $c->name }} </td>
        <td>
            {{ $c->price }}
         </td>

        <td>
            <a href="{{ route('admin.cources.edit', ['id'=>$c->id]) }}" class="btn btn-sm btn-info">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{ route('admin.cources.delete', ['id'=>$c->id]) }}">Delete</a>
        </td>

      </tr>
    @endforeach


    </tbody>
  </table>
  {!! $cources->render() !!}
@endsection

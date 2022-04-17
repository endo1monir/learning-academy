@extends('admin.layout')
@section('content')
<a class="btn btn-sm btn-primary" href="{{ route('admin.students.addToCource',['id'=>$s_id]) }}">Add To Cource</a>
<table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>



            @foreach ($cources as $c)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $c->name }}</td>
                    <td>


                        {{-- @if ($waited_cources[$loop->iteration-1] !== 'approve') --}}
                        @if($c->pivot->status!== 'approve')
                            <a href="{{ route('admin.students.approve', ['s_id' => $s_id, 'c_id' => $c->id]) }}"
                                class="btn btn-sm btn-success">Approve</a>
                        @endif
                        {{-- @if ($waited_cources[$loop->iteration-1] !== 'reject') --}}
                        @if($c->pivot->status!== 'reject')
                        <a class="btn btn-sm btn-danger"
                                href="{{ route('admin.students.reject', ['s_id' => $s_id, 'c_id' => $c->id]) }}">Reject</a>
                        @endif

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

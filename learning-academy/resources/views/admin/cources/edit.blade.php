@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between">
        <h6>Categories / Add new </h6>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.cources.index') }}">back</a>
    </div>
    @include('admin.inc.errors')
    <form method="post" action="{{ route('admin.cources.update',['id'=>$id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="" value="{{ $name }}" >
        </div>
        <div class="form-group">
            <label for="">small description</label>
            <input type="text" name="small_desc" class="form-control" id="" value="{{ $small_desc }}">
        </div>

        <div class="form-group">
            <label for=""> description</label>
            <textarea name="desc" cols="30" rows="10" class="form-control" id="" >{{ $desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="">price</label>
            <input type="number" name="price" class="form-control" id="" value="{{ $price }}">
        </div>
        <div class="form-group">
            <select name="cat_id" class="form-select m-5" aria-label="Default select example">
                @foreach ($cats as $cat)
                    @if ($cat->id == $cat_id)
                        <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                    @else
                        <option value='{{ $cat->id }}'>{{ $cat->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <select name="trainer_id" class="form-select m-5" aria-label="Default select example">
                @foreach ($trainers as $tr)
                    @if ($tr->id == $trainer_id)
                        <option value="{{ $tr->id }}" selected>{{ $tr->name }}</option>
                    @else
                        <option value='{{ $tr->id }}'>{{ $tr->name }}</option>
                    @endif
                @endforeach

            </select>
        </div>

<img src="{{ asset('/uploads/cources/'.$img) }}" alt="">

        <div class="form-group">
            <label for="">img</label>
            <input type="file" name="img" class="form-control-file" id="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

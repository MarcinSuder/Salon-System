
@extends('layout')
@section('content')
    <br>
    <form action="{{route('categories.update', $categories ->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
{{ csrf_field() }}
        <label for="title">TITLE:</label>
        <div class="form-group">
             <input type="text" name="name"  value="{{$categories->name}}" class="form-control"><br>
        </div>

        {{--<label for="content">CONTENT:</label>--}}
        {{--<div class="form-group">--}}
            {{--<textarea name="content" class="form-control">{{$page->content}}</textarea><br>--}}
        {{--</div>--}}

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="Edit">
        </div>
    </form>

@endsection

@extends('layout')
@section('content')
    <br>
    <form action="{{route('categories.store')}}" method="post">
        {{ csrf_field() }}
        <label for="title">TITLE:</label>
        <div class="form-group">
             <input type="text" name="title" class="form-control" ><br>
        </div>

        <label for="content">CONTENT:</label>
        <div class="form-group">
            <textarea name="content" class="form-control" ></textarea><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="add"
        </div>
    </form>

@endsection
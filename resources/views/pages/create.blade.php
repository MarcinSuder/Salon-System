
@extends('layout')
@section('content')
    <br>
    <form action="{{route('pages.store')}}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">TITLE:</label>
             <input type="text" name="title" class="form-control" ><br>
        </div>

        <div class="form-group">
        <label for="title">CATEGORY:</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $categorie)

                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>

                @endforeach
            </select>
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
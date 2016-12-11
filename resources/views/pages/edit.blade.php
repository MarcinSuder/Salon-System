
@extends('layout')
@section('content')
    <br>
    <form action="{{route('pages.update', $page ->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
{{ csrf_field() }}
        <label for="title">TITLE:</label>
        <div class="form-group">
             <input type="text" name="title"  value="{{$page->title}}" class="form-control"><br>
        </div>

        <div class="form-group">
            <label for="title">CATEGORY:</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $categorie)

                    @if($categorie->id == $page->category_id)
                        <option selected="selected" value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @else
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <label for="content">CONTENT:</label>
        <div class="form-group">
            <textarea name="content" class="form-control">{{$page->content}}</textarea><br>
        </div>

        <div class="form-group">
            <input id="edit" type="submit" class="btn btn-primary" value="Edit">
        </div>
    </form>

@endsection
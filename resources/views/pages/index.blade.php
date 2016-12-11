@extends('layout')

@section('content')

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>CATEGORY</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->category->name }}</td>

                <td><a class="btn btn-info" href="{{ route('pages.edit', $page->id) }}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('pages.destroy', $page->id) }}">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $pages->links() }}


@endsection
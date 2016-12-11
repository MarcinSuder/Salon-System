@extends('layout')

@section('content')






    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>TITLE</th>

        </tr>
        @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->id }}</td>
                <td>{{ $categorie->name  }}</td>

                <td><a class="btn btn-info" href="{{ route('categories.edit', $categorie->id) }}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('categories.destroy', $categorie->id) }}">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $categories->links() }}


@endsection
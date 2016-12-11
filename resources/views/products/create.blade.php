
@extends('layout')
@section('content')
    <br>
    <form action="{{route('products.store')}}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
             <label for="title">NAZWA PRODUKTU:</label>
             <input type="text" name="products_name" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="title">POJEMNOŚĆ OPAKOWANIA(w gr):</label>
            <input type="text" name="products_capacity" class="form-control" ><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="DODAJ"
        </div>
    </form>

@endsection
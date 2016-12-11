
@extends('layout')
@section('content')
    <br>
    <form action="{{route('products.update', $product->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}

        <label for="title">NAZWA PRODUKTU:</label>
        <div class="form-group">
             <input type="text" name="products_name"  value="{{$product->products_name}}" class="form-control"><br>
        </div>

        <div class="form-group">
            <label for="title">POJEMNOŚĆ OPAKOWANIA(w gr):</label>
            <input type="text" name="products_capacity"  value="{{$product->products_capacity}}" class="form-control"><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="ZMIEŃ">
        </div>
    </form>

@endsection
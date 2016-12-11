
@extends('layout')
@section('content')
    <br>
    <form action="{{route('warehouses.update', $warehouse->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="products_id">Select Product from list:</label>
            <select class="form-control" name="products_id">
                @foreach($products as $product)

                    @if($product->id == $warehouse->products_id)
                        <option selected="selected" value="{{$product->id}}">{{$product->products_name}}</option>
                    @else
                        <option value="{{$product->id}}">{{$product->products_name}}</option>
                    @endif

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="capacity">POJEMNOŚĆ(w gr)</label>
            <input type="text" name="capacity"  value="{{$warehouse->capacity}}" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="quantity">ILOŚĆ:</label>
            <input type="text" name="quantity" value="{{$warehouse->quantity}}" class="form-control" ><br>
        </div>

        <label for="price">CENA:</label>
        <div class="form-group">
            <input name="price" value="{{$warehouse->price}}" class="form-control"> </input><br>
        </div>

        <div class="form-group">
            <input id="change" type="submit" class="btn btn-primary" value="ZMIEŃ"
        </div>
    </form>

@endsection
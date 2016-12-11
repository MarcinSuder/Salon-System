
@extends('layout')
@section('content')
    <br>
    <form action="{{route('warehouses.store')}}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="products_id">Select Product from list:</label>
            <select class="form-control" name="products_id">
                @foreach($products as $product)

                    <option value="{{$product->id}}">{{$product->products_name}}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="capacity">POJEMNOŚĆ(w gr)</label>
            <input type="text" name="capacity" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="quantity">ILOŚĆ</label>
            <input type="text" name="quantity" class="form-control" ><br>
        </div>

        <label for="price">CENA:</label>
        <div class="form-group">
            <input name="price" class="form-control" ></input><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="DODAJ"
        </div>
    </form>

@endsection
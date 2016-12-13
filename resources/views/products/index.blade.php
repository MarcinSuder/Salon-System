
@extends('layout')

@section('content')

    <br/>
    <a class="btn btn-info" href="{{ route('appointments.index') }}">WIZYTY</a>
    <a class="btn btn-info" href="{{ route('clients.index') }}">KLIENCI</a>
    <a class="btn btn-info" href="{{ route('warehouses.index') }}">MAGAZYN</a>
    <a class="btn btn-info" href="{{ route('products.index') }}">PRODUKTY</a>

    <br/><br/>
    <h1 style="color:#ff3c6c">PRODUKTY</h1>
    <br/>

    <a class="btn btn-success" href="{{ route('products.create') }}">DODAJ PRODUKT</a>
    <br/><br/>
    @if($error)
       UPS...BŁĄD
    @endif
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>NAZWA PRODUKTU</th>
            <th>POJEMNOŚĆ(w gramach)</th>
            <th>ZMIEŃ</th>
            <th>USUŃ</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->products_name }}</td>
                <td>{{ $product->products_capacity }}</td>

                <td><a class="btn btn-warning" href="{{ route('products.edit', $product->id) }}">ZMIEŃ</a>
                </td>
                <td>
                    <form method="post" action="{{ route('products.destroy', $product->id) }}">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">USUŃ</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

    {{ $products->links() }}


@endsection
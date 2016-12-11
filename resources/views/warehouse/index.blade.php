
@extends('layout')

@section('content')

    <br/>
    <a class="btn btn-info" href="{{ route('appointments.index') }}">WIZYTY</a>
    <a class="btn btn-info" href="{{ route('clients.index') }}">KLIENCI</a>
    <a class="btn btn-info" href="{{ route('warehouses.index') }}">MAGAZYN</a>
    <a class="btn btn-info" href="{{ route('products.index') }}">PRODUKTY</a>

    <br/><br/>

    <a class="btn btn-success" href="{{ route('warehouses.create') }}">DODAJ PRODUKT DO MAGAZYNU</a>
    <br/><br/>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>NAZWA PRODUKTU</th>
            <th>POJEMNOŚĆ(gr)</th>
            <th>ILOŚĆ</th>
            <th>ZAKUPIONO</th>
            <th>ZUŻYTO PRODUKTU:</th>
            <th>POZOSTAŁO</th>
            <th>CENA</th>
            <th>ZMIEŃ</th>
            <th>USUŃ</th>
        </tr>
        @foreach($warehouses as $warehouse)
            <tr>
                <td>{{ $warehouse->id }}</td>
                <td>{{ $warehouse->products->products_name }}</td>
                <td>{{ $warehouse->products->products_capacity }}</td>
                <td>{{ $warehouse->quantity }}</td>
                <td>{{ $warehouse->products->products_capacity*$warehouse->quantity }}</td>
                <td>{{ App\AppointmentsHasProducts::where('products_id', $warehouse->products_id)->sum('used') }} </td>
                <td>{{ ($warehouse->products->products_capacity*$warehouse->quantity) - App\AppointmentsHasProducts::where('products_id', $warehouse->products_id)->sum('used') }} </td>
                <td>{{ $warehouse->price }}</td>

                <td><a class="btn btn-warning" href="{{ route('warehouses.edit', $warehouse->id) }}">ZMIEŃ</a>
                </td>
                <td>
                    <form method="post" action="{{ route('warehouses.destroy', $warehouse->id) }}">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" >USUŃ</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $warehouses->links() }}


@endsection
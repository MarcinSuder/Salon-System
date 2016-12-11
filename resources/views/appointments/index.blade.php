
@extends('layout')

@section('content')

    <br/>
    <a class="btn btn-info" href="{{ route('appointments.index') }}">WIZYTY</a>
    <a class="btn btn-info" href="{{ route('clients.index') }}">KLIENCI</a>
    <a class="btn btn-info" href="{{ route('warehouses.index') }}">MAGAZYN</a>
    <a class="btn btn-info" href="{{ route('products.index') }}">PRODUKTY</a>

    <br/><br/>
    <a class="btn btn-success" href="{{ route('appointments.create') }}">DODAJ WIZYTĘ</a>
    <br/><br/>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>DATA WIZYTY</th>
            <th>IMIĘ</th>
            <th>NAZWISKO</th>
            <th>UWAGI</th>
            <th>ZAPŁACONO</th>
            <th>UŻYTO</th>
            <th>ZMIEŃ</th>
            <th>USUŃ</th>
        </tr>

        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->clients->first_name }}</td>
                <td>{{ $appointment->clients->last_name }}</td>
                <td>{{ $appointment->notes }}</td>
                <td>{{ $appointment->paid }}</td>
                <td>
                    <a class="btn btn-info" href="/appointments/used/products/{{$appointment->id}}">POKAŻ PRODUKTY</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('appointments.edit', $appointment->id) }}">ZMIEŃ</a>
                </td>

                <td>
                    <form method="post" action="{{ route('appointments.destroy', $appointment->id) }}">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">USUŃ</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $appointments->links() }}


@endsection
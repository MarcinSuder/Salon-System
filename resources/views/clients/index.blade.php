
@extends('layout')

@section('content')
        <br/>
        <a class="btn btn-info" href="{{ route('appointments.index') }}">WIZYTY</a>
        <a class="btn btn-info" href="{{ route('clients.index') }}">KLIENCI</a>
        <a class="btn btn-info" href="{{ route('warehouses.index') }}">MAGAZYN</a>
        <a class="btn btn-info" href="{{ route('products.index') }}">PRODUKTY</a>

        <br/><br/>
        <h1 style="color:#ff3c6c">KLIENCI</h1>
        <br/>

        <a class="btn btn-success" href="{{ route('clients.create') }}">DODAJ KLIENTA</a>
        <br/><br/>


        <form method="get">
            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" name="wyszukaj_klienta" class="form-control" value="{{$wyszukaj_klienta}}" placeholder="Wyszukaj po imieniu lub nazwisku ">
            </div>

            <div>
                <button type="submit" class="btn btn-primary ">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>WYSZUKAJ KLIENTA</button>
            </div>
            <br/>
        </form>

        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>IMIĘ</th>
                <th>NAZWISKO</th>
                <th>TELEFON</th>
                <th>UWAGI</th>
                <th>ZMIEŃ</th>
                <th>USUŃ</th>
            </tr>
           @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->phone_number }}</td>
                <td>{{ $client->preferences }}</td>

                <td>
                    <a class="btn btn-info" href="/showappointments/{{$client->id}}">HISTORIA WIZYT</a>
                </td>

                <td>
                    <a class="btn btn-warning" href="{{ route('clients.edit', $client->id) }}">ZMIEŃ</a>
                </td>
                <td>
                    <form method="post" action="{{ route('clients.destroy', $client->id) }}">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">USUŃ</button>
                    </form>
                </td>
            </tr>
           @endforeach
        </table>




@endsection
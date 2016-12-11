
@extends('layout')
@section('content')

    <br>
    <form action="/showappointments/{id}" method="get">
        {{ csrf_field() }}

        <table class="table table-hover">

                <tr>
                    <th>ID</th>
                    <th>IMIĘ</th>
                    <th>NAZWISKO</th>
                    <th>DATA WIZYTY</th>
                    <th>UWAGI</th>
                    <th>ZAPŁACONO</th>
                    <th>UŻYTE PRODUKTY</th>
                </tr>

            @foreach($appointments as $appointment)

                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->clients->first_name }}</td>
                    <td>{{ $appointment->clients->last_name }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->notes }}</td>
                    <td>{{ $appointment->paid }}</td>
                    <td>
                        <a class="btn btn-info" href="/appointments/used/products/{{$appointment->id}}">POKAZ UŻYTE PRODUKTY</a>
                    </td>

                </tr>
        </table>

            @endforeach
@endsection
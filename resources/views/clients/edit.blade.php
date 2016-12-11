
@extends('layout')
@section('content')

    <br>
    <form action="{{route('clients.update', $client->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="first_name">IMIĘ:</label>
            <input type="text" name="first_name" value="{{$client->first_name}}"  class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="last_name">NAZWISKO:</label>
            <input type="text" name="last_name" value="{{$client->last_name}}" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="phone_number">TELEFON:</label>
            <input type="text" name="phone_number" value="{{$client->phone_number}}"class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="preferences">NOTATKI:</label>
            <input type="text" name="preferences" value="{{$client->preferences}}" class="form-control" ><br>
        </div>

        <div class="form-group">
            <input id="edit" type="submit" class="btn btn-primary" value="ZMIEŃ"
        </div>
    </form>

@endsection
@extends('layout')
@section('content')
    <br>
    <form action="{{route('appointments.update', $appointment->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="clients_id">WYBIERZ KLIENTA Z LISTY:</label>
            <select class="form-control" name="clients_id">

                @foreach($clients as $client)
                    @if($client->id == $appointment->clients_id)
                    <option selected="selected" value="{{$client->id}}">{{$client->first_name}} {{$client->last_name}}</option>
                    @else
                        <option value="{{$client->id}}">{{$client->first_name}} {{$client->last_name}}</option>
                    @endif
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="date">ZAPŁACONO:</label>
            <input type="text" name="paid" value="{{$appointment->paid}}" class="form-control" ><br>
        </div>


        <div class="form-group">
            <label for="date">DATA:</label>
            <input type="text" name="date" value="{{$appointment->date}}" id="datepicker" class="form-control" ><br>
        </div>

        <label for="price">UWAGI:</label>
        <div class="form-group">
            <input name="notes" value="{{$appointment->notes}}" class="form-control" ></input><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="ZMIEŃ"
        </div>
    </form>

    <script>

        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat : 'yy-mm-dd'
            });
        } );

    </script>
@endsection
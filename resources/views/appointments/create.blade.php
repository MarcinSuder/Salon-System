
@extends('layout')
@section('content')
    <br>
    <form action="{{route('appointments.store')}}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="clients_id">WYBIERZ KLIENTA Z LISTY:</label>
            <select class="form-control" name="clients_id">
                @foreach($clients as $client)

                    <option value="{{$client->id}}">{{$client->first_name}} {{$client->last_name}}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date">ZAPŁACONO:</label>
            <input type="text" name="paid" class="form-control" ><br>
        </div>


        <div class="form-group">
            <label for="date">DATA:</label>
            <input type="text" name="date" id="datepicker" class="form-control" ><br>
        </div>

        <label for="price">UWAGI:</label>
        <div class="form-group">
            <input name="notes" class="form-control" ><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="DODAJ"
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
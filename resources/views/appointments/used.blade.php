@extends('layout')
@section('content')
    <br/>
    <button class="btn btn-success add-product" href="">DODAJ PRODUKT</button>
    <br/><br/>

    <div class="first" style="display:none;">

        <div class="form-group">
            <input type="hidden" name="app_id[]" value="0">

            <label>WYBIERZ PRODUKT Z LISTY:</label>
            <select class="form-control" name="products_id[]">
                @foreach($products as $product)

                    <option value="{{$product->id}}">{{$product->products_name}}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>ILE GRAMÓW PRODUKTU:</label>
            <input type="text" name="used[]" class="form-control" ><br>
        </div>

        <div class="delete">
        </div>

    </div>

    <form action="/appointments/edit/appointments" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{$id}}">

        @foreach($appointments as $appointment)

            <div class="form-group">

                <input type="hidden" name="app_id[]" value="{{$appointment->id}}">

                <label>WYBIERZ PRODUKT Z LISTY:</label>
                <select class="form-control" name="products_id[]">
                    @foreach($products as $product)
                        @if($appointment->products_id == $product->id)
                            <option selected="selected" value="{{$product->id}}">{{$product->products_name}}</option>
                        @else
                            <option value="{{$product->id}}">{{$product->products_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

           <div class="form-group">
                <label>ILE GRAMÓW PRODUKTU:</label>
                <input type="text" name="used[]" value="{{$appointment->used}}" class="form-control" ><br>
               <a class="btn btn-danger" href="/appointments/used/remove/{{$appointment->id}}">USUŃ</a>
           </div>

        @endforeach

        <div class="other">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="ZAPISZ WIZYTĘ">
        </div>
    </form>

    <script>
        $(document).ready(function(){
            $('.add-product').click(function () {
                var first = $('.first');

                var other = $('.other');

                other.append('<div class="pack">' + first.html() + '</div>');
                other
                        .find('.delete')
                        .last()

                        .append($('<button type="button" class="btn btn-danger">USUŃ</button>'))
                        .click(function(){
                            $(this)
                                    .parent('.pack')
                                    .remove();
                        });
            });
        });
    </script>

@endsection
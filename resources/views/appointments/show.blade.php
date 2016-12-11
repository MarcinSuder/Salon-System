@extends('layout')
@section('content')
    <br/>
    <button class="btn btn-success add-product" href="">DODAJ KOLEJNY UŻYTY PRODUKT</button>
    <br/><br/>
    <form action="/appointments/add/appointments" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$id}}">
        <div class="first">

            <div class="form-group">
                <label>WYBIERZ PRODUKT Z LISTY:</label>
                <select class="form-control" name="products_id[]">
                    @foreach($products as $product)

                        <option value="{{$product->id}}">{{$product->products_name}}</option>

                    @endforeach
                </select>
            </div>

                   <div class="form-group">
                    <label> ILE GRAMÓW  PRODUKTU:</label>
                    <input type="text" name="used[]" class="form-control" ><br>
                   </div>

            <div class="delete">
            </div>

        </div>

        <div class="other"></div>


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
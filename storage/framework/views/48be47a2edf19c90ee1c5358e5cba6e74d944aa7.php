<?php $__env->startSection('content'); ?>
    <br/>
    <button class="btn btn-success add-product" href="">DODAJ KOLEJNY UŻYTY PRODUKT</button>
    <br/><br/>
    <form action="/appointments/add/appointments" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="id" value="<?php echo e($id); ?>">
        <div class="first">

            <div class="form-group">
                <label>WYBIERZ PRODUKT Z LISTY:</label>
                <select class="form-control" name="products_id[]">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->products_name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
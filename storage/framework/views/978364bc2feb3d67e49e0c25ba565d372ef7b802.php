<?php $__env->startSection('content'); ?>
    <br/>
    <button class="btn btn-success add-product" href="">DODAJ PRODUKT</button>
    <br/><br/>

    <div class="first" style="display:none;">

        <div class="form-group">
            <input type="hidden" name="app_id[]" value="0">

            <label>WYBIERZ PRODUKT Z LISTY:</label>
            <select class="form-control" name="products_id[]">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->products_name); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
        <?php echo e(csrf_field()); ?>


        <input type="hidden" name="id" value="<?php echo e($id); ?>">

        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <div class="form-group">

                <input type="hidden" name="app_id[]" value="<?php echo e($appointment->id); ?>">

                <label>WYBIERZ PRODUKT Z LISTY:</label>
                <select class="form-control" name="products_id[]">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($appointment->products_id == $product->id): ?>
                            <option selected="selected" value="<?php echo e($product->id); ?>"><?php echo e($product->products_name); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->products_name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
            </div>

           <div class="form-group">
                <label>ILE GRAMÓW PRODUKTU:</label>
                <input type="text" name="used[]" value="<?php echo e($appointment->used); ?>" class="form-control" ><br>
               <a class="btn btn-danger" href="/appointments/used/remove/<?php echo e($appointment->id); ?>">USUŃ</a>
           </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <div class="other">
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
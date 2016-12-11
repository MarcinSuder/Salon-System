<?php $__env->startSection('content'); ?>
    <br>
    <form action="<?php echo e(route('products.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
             <label for="title">NAZWA PRODUKTU:</label>
             <input type="text" name="products_name" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="title">POJEMNOŚĆ OPAKOWANIA(w gr):</label>
            <input type="text" name="products_capacity" class="form-control" ><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="DODAJ"
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
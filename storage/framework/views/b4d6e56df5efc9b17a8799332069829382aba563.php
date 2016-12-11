<?php $__env->startSection('content'); ?>
    <br>
    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="post">
        <input name="_method" type="hidden" value="PUT">
        <?php echo e(csrf_field()); ?>


        <label for="title">PRODUCT'S NAME:</label>
        <div class="form-group">
             <input type="text" name="products_name"  value="<?php echo e($product->products_name); ?>" class="form-control"><br>
        </div>

        <div class="form-group">
            <label for="title">PRODUCT'S CAPACITY(ml):</label>
            <input type="text" name="products_capacity"  value="<?php echo e($product->products_capacity); ?>" class="form-control"><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="Edit">
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
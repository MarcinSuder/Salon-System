<?php $__env->startSection('content'); ?>
    <br>
    <form action="<?php echo e(route('warehouses.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="products_id">Select Product from list:</label>
            <select class="form-control" name="products_id">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->products_name); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label for="capacity">POJEMNOŚĆ(w gr)</label>
            <input type="text" name="capacity" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="quantity">ILOŚĆ</label>
            <input type="text" name="quantity" class="form-control" ><br>
        </div>

        <label for="price">CENA:</label>
        <div class="form-group">
            <input name="price" class="form-control" ></input><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="DODAJ"
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
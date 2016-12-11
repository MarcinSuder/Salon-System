<?php $__env->startSection('content'); ?>

    <br/>
    <a class="btn btn-info" href="<?php echo e(route('appointments.index')); ?>">WIZYTY</a>
    <a class="btn btn-info" href="<?php echo e(route('clients.index')); ?>">KLIENCI</a>
    <a class="btn btn-info" href="<?php echo e(route('warehouses.index')); ?>">MAGAZYN</a>
    <a class="btn btn-info" href="<?php echo e(route('products.index')); ?>">PRODUKTY</a>

    <br/><br/>

    <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>">DODAJ PRODUKT</a>
    <br/><br/>
    <?php if($error): ?>
       UPS...BŁĄD
    <?php endif; ?>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>NAZWA PRODUKTU</th>
            <th>POJEMNOŚĆ(w gramach)</th>
            <th>ZMIEŃ</th>
            <th>USUŃ</th>
        </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->products_name); ?></td>
                <td><?php echo e($product->products_capacity); ?></td>

                <td><a class="btn btn-warning" href="<?php echo e(route('products.edit', $product->id)); ?>">ZMIEŃ</a>
                </td>
                <td>
                    <form method="post" action="<?php echo e(route('products.destroy', $product->id)); ?>">
                        <input name="_method" type="hidden" value="DELETE">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger">USUŃ</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    </table>

    <?php echo e($products->links()); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
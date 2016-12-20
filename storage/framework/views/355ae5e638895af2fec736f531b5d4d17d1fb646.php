<?php $__env->startSection('content'); ?>

    <br/>
    <a class="btn btn-info" href="<?php echo e(route('appointments.index')); ?>">WIZYTY</a>
    <a class="btn btn-info" href="<?php echo e(route('clients.index')); ?>">KLIENCI</a>
    <a class="btn btn-info" href="<?php echo e(route('warehouses.index')); ?>">MAGAZYN</a>
    <a class="btn btn-info" href="<?php echo e(route('products.index')); ?>">PRODUKTY</a>

    <br/><br/>
    <h1 style="color:#ff3c6c">MAGAZYN</h1>
    <br/>

    <a class="btn btn-success" href="<?php echo e(route('warehouses.create')); ?>">DODAJ PRODUKT DO MAGAZYNU</a>
    <br/><br/>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>NAZWA PRODUKTU</th>
            <th>POJEMNOŚĆ(gr)</th>
            <th>ILOŚĆ</th>
            <th>ZAKUPIONO</th>
            <th>ZUŻYTO PRODUKTU:</th>
            <th>POZOSTAŁO</th>
            <th>CENA</th>
            <th>ZMIEŃ</th>
            <th>USUŃ</th>
        </tr>
        <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($warehouse->id); ?></td>
                <td><?php echo e($warehouse->products->products_name); ?></td>
                <td><?php echo e($warehouse->products->products_capacity); ?></td>
                <td><?php echo e($warehouse->quantity); ?></td>
                <td><?php echo e($warehouse->products->products_capacity*$warehouse->quantity); ?></td>
                <td><?php echo e(App\AppointmentsHasProducts::where('products_id', $warehouse->products_id)->sum('used')); ?> </td>
                <td><?php echo e(($warehouse->products->products_capacity*$warehouse->quantity) - App\AppointmentsHasProducts::where('products_id', $warehouse->products_id)->sum('used')); ?> </td>
                <td><?php echo e($warehouse->price); ?></td>

                <td><a class="btn btn-warning" href="<?php echo e(route('warehouses.edit', $warehouse->id)); ?>">ZMIEŃ</a>
                </td>
                <td>
                    <form method="post" action="<?php echo e(route('warehouses.destroy', $warehouse->id)); ?>">
                        <input name="_method" type="hidden" value="DELETE">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger" >USUŃ</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </table>

    <?php echo e($warehouses->links()); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
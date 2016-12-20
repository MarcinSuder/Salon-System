<?php $__env->startSection('content'); ?>

    <br/>
    <a class="btn btn-info" href="<?php echo e(route('appointments.index')); ?>">WIZYTY</a>
    <a class="btn btn-info" href="<?php echo e(route('clients.index')); ?>">KLIENCI</a>
    <a class="btn btn-info" href="<?php echo e(route('warehouses.index')); ?>">MAGAZYN</a>
    <a class="btn btn-info" href="<?php echo e(route('products.index')); ?>">PRODUKTY</a>

    <br/><br/>
    <h1 style="color:#ff3c6c">WIZYTY</h1>
    <br/>

    <a class="btn btn-success" href="<?php echo e(route('appointments.create')); ?>">DODAJ WIZYTĘ</a>
    <br/><br/>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>DATA WIZYTY</th>
            <th>IMIĘ</th>
            <th>NAZWISKO</th>
            <th>UWAGI</th>
            <th>ZAPŁACONO</th>
            <th>UŻYTO</th>
            <th>ZMIEŃ</th>
            <th>USUŃ</th>
        </tr>

        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($appointment->id); ?></td>
                <td><?php echo e($appointment->date); ?></td>
                <td><?php echo e($appointment->clients->first_name); ?></td>
                <td><?php echo e($appointment->clients->last_name); ?></td>
                <td><?php echo e($appointment->notes); ?></td>
                <td><?php echo e($appointment->paid); ?></td>
                <td>
                    <a class="btn btn-info" href="/appointments/used/products/<?php echo e($appointment->id); ?>">POKAŻ PRODUKTY</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="<?php echo e(route('appointments.edit', $appointment->id)); ?>">ZMIEŃ</a>
                </td>

                <td>
                    <form method="post" action="<?php echo e(route('appointments.destroy', $appointment->id)); ?>">
                        <input name="_method" type="hidden" value="DELETE">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger">USUŃ</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </table>

    <?php echo e($appointments->links()); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
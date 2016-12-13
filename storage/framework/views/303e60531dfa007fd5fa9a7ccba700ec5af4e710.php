<?php $__env->startSection('content'); ?>

    <br>
    <form action="/showappointments/{id}" method="get">
        <?php echo e(csrf_field()); ?>


        <table class="table table-hover">

                <tr>
                    <th>ID</th>
                    <th>IMIĘ</th>
                    <th>NAZWISKO</th>
                    <th>DATA WIZYTY</th>
                    <th>UWAGI</th>
                    <th>ZAPŁACONO</th>
                    <th>UŻYTE PRODUKTY</th>
                </tr>

            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                <tr>
                    <td><?php echo e($appointment->id); ?></td>
                    <td><?php echo e($appointment->clients->first_name); ?></td>
                    <td><?php echo e($appointment->clients->last_name); ?></td>
                    <td><?php echo e($appointment->date); ?></td>
                    <td><?php echo e($appointment->notes); ?></td>
                    <td><?php echo e($appointment->paid); ?></td>
                    <td>
                        <a class="btn btn-info" href="/appointments/used/products/<?php echo e($appointment->id); ?>">POKAZ UŻYTE PRODUKTY</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
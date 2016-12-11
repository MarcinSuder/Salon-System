<?php $__env->startSection('content'); ?>

    <br>
    <form action="/showappointments/{id}" method="get">
        <?php echo e(csrf_field()); ?>


        <table class="table table-hover">

                <tr>
                    <th>Id</th>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Data_wizyty</th>
                    <th>Notatki</th>
                    <th>Zapłacono</th>
                    <th>Użyte Produkty</th>
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
                        <a class="btn btn-info" href="/appointments/used/products/<?php echo e($appointment->id); ?>">Show Used product</a>
                    </td>

                </tr>
        </table>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
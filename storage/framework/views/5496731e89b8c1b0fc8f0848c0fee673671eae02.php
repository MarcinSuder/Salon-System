<?php $__env->startSection('content'); ?>
    <br>
    <form action="<?php echo e(route('appointments.update', $appointment->id)); ?>" method="post">
        <input name="_method" type="hidden" value="PUT">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="clients_id">WYBIERZ KLIENTA Z LISTY:</label>
            <select class="form-control" name="clients_id">

                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php if($client->id == $appointment->clients_id): ?>
                    <option selected="selected" value="<?php echo e($client->id); ?>"><?php echo e($client->first_name); ?> <?php echo e($client->last_name); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($client->id); ?>"><?php echo e($client->first_name); ?> <?php echo e($client->last_name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </select>
        </div>

        <div class="form-group">
            <label for="date">ZAPŁACONO:</label>
            <input type="text" name="paid" value="<?php echo e($appointment->paid); ?>" class="form-control" ><br>
        </div>


        <div class="form-group">
            <label for="date">DATA:</label>
            <input type="text" name="date" value="<?php echo e($appointment->date); ?>" id="datepicker" class="form-control" ><br>
        </div>

        <label for="price">UWAGI:</label>
        <div class="form-group">
            <input name="notes" value="<?php echo e($appointment->notes); ?>" class="form-control" ></input><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="ZMIEŃ"
        </div>
    </form>

    <script>

        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat : 'yy-mm-dd'
            });
        } );

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
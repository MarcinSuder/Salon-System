<?php $__env->startSection('content'); ?>
    <br>
    <form action="<?php echo e(route('appointments.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="clients_id">WYBIERZ KLIENTA Z LISTY:</label>
            <select class="form-control" name="clients_id">
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                    <option value="<?php echo e($client->id); ?>"><?php echo e($client->first_name); ?> <?php echo e($client->last_name); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label for="date">ZAPŁACONO:</label>
            <input type="text" name="paid" class="form-control" ><br>
        </div>


        <div class="form-group">
            <label for="date">DATA:</label>
            <input type="text" name="date" id="datepicker" class="form-control" ><br>
        </div>

        <label for="price">UWAGI:</label>
        <div class="form-group">
            <input name="notes" class="form-control" ><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="DODAJ"
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
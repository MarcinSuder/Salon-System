<?php $__env->startSection('content'); ?>

    <br>
    <form action="<?php echo e(route('clients.update', $client->id)); ?>" method="post">
        <input name="_method" type="hidden" value="PUT">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="first_name">IMIĘ:</label>
            <input type="text" name="first_name" value="<?php echo e($client->first_name); ?>"  class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="last_name">NAZWISKO:</label>
            <input type="text" name="last_name" value="<?php echo e($client->last_name); ?>" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="phone_number">TELEFON:</label>
            <input type="text" name="phone_number" value="<?php echo e($client->phone_number); ?>"class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="preferences">NOTATKI:</label>
            <input type="text" name="preferences" value="<?php echo e($client->preferences); ?>" class="form-control" ><br>
        </div>

        <div class="form-group">
            <input id="edit" type="submit" class="btn btn-primary" value="ZMIEŃ"
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <br>
    <form action="<?php echo e(route('clients.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
             <label for="first_name">IMIĘ:</label>
             <input type="text" name="first_name" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="last_name">NAZWISKO:</label>
            <input type="text" name="last_name" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="phone_number">NUMER TELEFONU:</label>
            <input type="text" name="phone_number" class="form-control" ><br>
        </div>

        <div class="form-group">
            <label for="preferences">NOTATKI:</label>
            <input type="text" name="preferences" class="form-control" ><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="DODAJ"
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
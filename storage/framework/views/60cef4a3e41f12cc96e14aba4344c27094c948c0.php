<?php $__env->startSection('content'); ?>
    <br>
    <form action="<?php echo e(route('pages.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="title">TITLE:</label>
             <input type="text" name="title" class="form-control" ><br>
        </div>

        <div class="form-group">
        <label for="title">CATEGORY:</label>
            <select class="form-control" name="category_id">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                    <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->name); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>

        <label for="content">CONTENT:</label>
        <div class="form-group">
            <textarea name="content" class="form-control" ></textarea><br>
        </div>

        <div class="form-group">
            <input id="add" type="submit" class="btn btn-primary" value="add"
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>






    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>TITLE</th>

        </tr>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($categorie->id); ?></td>
                <td><?php echo e($categorie->name); ?></td>

                <td><a class="btn btn-success" href="<?php echo e(route('categories.create', $categorie->id)); ?>">Add Client</a>
                </td>

                <td><a class="btn btn-info" href="<?php echo e(route('categories.edit', $categorie->id)); ?>">Edit</a>
                </td>
                <td>
                    <form method="post" action="<?php echo e(route('categories.destroy', $categorie->id)); ?>">
                        <input name="_method" type="hidden" value="DELETE">
                        <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </table>

    <?php echo e($categories->links()); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
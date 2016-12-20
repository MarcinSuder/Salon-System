<?php $__env->startSection('content'); ?>






    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>CATEGORY</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($page->id); ?></td>
                <td><?php echo e($page->title); ?></td>
                <td><?php echo e($page->category->name); ?></td>

                <td><a class="btn btn-info" href="<?php echo e(route('pages.edit', $page->id)); ?>">Edit</a>
                </td>
                <td>
                    <form method="post" action="<?php echo e(route('pages.destroy', $page->id)); ?>">
                        <input name="_method" type="hidden" value="DELETE">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </table>

    <?php echo e($pages->links()); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
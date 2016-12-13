<?php $__env->startSection('content'); ?>
        <br/>
        <a class="btn btn-info" href="<?php echo e(route('appointments.index')); ?>">WIZYTY</a>
        <a class="btn btn-info" href="<?php echo e(route('clients.index')); ?>">KLIENCI</a>
        <a class="btn btn-info" href="<?php echo e(route('warehouses.index')); ?>">MAGAZYN</a>
        <a class="btn btn-info" href="<?php echo e(route('products.index')); ?>">PRODUKTY</a>

        <br/><br/>
        <h1 style="color:#ff3c6c">KLIENCI</h1>
        <br/>

        <a class="btn btn-success" href="<?php echo e(route('clients.create')); ?>">DODAJ KLIENTA</a>
        <br/><br/>


        <form method="get">
            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <input type="text" name="wyszukaj_klienta" class="form-control" value="<?php echo e($wyszukaj_klienta); ?>" placeholder="Wyszukaj po imieniu lub nazwisku ">
            </div>

            <div>
                <button type="submit" class="btn btn-primary ">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>WYSZUKAJ KLIENTA</button>
            </div>
            <br/>
        </form>

        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>IMIĘ</th>
                <th>NAZWISKO</th>
                <th>TELEFON</th>
                <th>UWAGI</th>
                <th>ZMIEŃ</th>
                <th>USUŃ</th>
            </tr>
           <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($client->id); ?></td>
                <td><?php echo e($client->first_name); ?></td>
                <td><?php echo e($client->last_name); ?></td>
                <td><?php echo e($client->phone_number); ?></td>
                <td><?php echo e($client->preferences); ?></td>

                <td>
                    <a class="btn btn-info" href="/showappointments/<?php echo e($client->id); ?>">HISTORIA WIZYT</a>
                </td>

                <td>
                    <a class="btn btn-warning" href="<?php echo e(route('clients.edit', $client->id)); ?>">ZMIEŃ</a>
                </td>
                <td>
                    <form method="post" action="<?php echo e(route('clients.destroy', $client->id)); ?>">
                        <input name="_method" type="hidden" value="DELETE">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger">USUŃ</button>
                    </form>
                </td>
            </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
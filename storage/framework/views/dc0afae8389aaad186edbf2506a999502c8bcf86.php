<?php $__env->startSection('content'); ?>
<div class="column is-9">
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Clients
                </h1>
                
            </div>
        </div>
    </section><br><br>
    <div class="columns">
        <div class="column">
            <table border="1" class="table is-fullwidth">
                <tr>
                    <th>Client Id</th>
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>No Of Projects</th>
                    <th>Remove</th>
                </tr>

                <?php $i = 0 ; ?>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $i++ ; ?>
					<tr>
						<td><?php echo e($i); ?></td>  
						<td><?php echo e($client->name); ?> </td>
						<td><?php echo e($client->email); ?></td>
						<td> - </td> 
						<td> 
                        <a class="button is-small is-info" href="<?php echo e(route('clients.edit',$client->id)); ?>">Edit</a>
                        <a class="button is-small is-danger" href="<?php echo e(route('clients.delete',$client->id)); ?>">Remove</a>
							</td> 
					</tr> 
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/status/resources/views/clients/list.blade.php ENDPATH**/ ?>
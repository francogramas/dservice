<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Nuestros servicios</h4></div>
        <div class="panel-body">
        <div class="row">
        <?php $__currentLoopData = $tiposervicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tiposervicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 form-group">
                   <a href=<?php echo e(route('servicios.show',$tiposervicio->id)); ?> class="btn btn-primary form-control">
                        <?php echo e($tiposervicio->nombre); ?>

                    </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appGeneral', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
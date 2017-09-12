<?php $__env->startSection('content'); ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Nuestros servicios</h4></div>
        <div class="panel-body">
	        <div class="row">
		        <div class="col-md-10 col-md-offset-1 form-group">
	                <input id="serviciosContratistas" type="text" class="form-control" placeholder="Buscar en nuestra red de servicios">
	                <input type="hidden" id="servicioscontratistas_id">
	             </div>
	        </div>

	    </div>
	    <div class="row">
	    	<div class="col-sm-10" id="tablaServicios">
	    		<table class="table">
	    			<thead>
	    				<tr>
	    					<td>Servicio</td>
	    					<td>Valor</td>
	    					<td>Contratista</td>
	    					<td></td>
	    				</tr>
	    			</thead>
	    			<tbody>
	    			<?php $__currentLoopData = $servicioscontratistas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicioscontratista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    				<tr>
	    					<td>
	    						<?php echo e($servicioscontratista->nombre); ?>

	    						<br>
								<?php echo e(str_limit($servicioscontratista->descripcion,50,'...')); ?>

	    					</td>
	    					<td>
	    						<?php echo e($servicioscontratista->tarifaparticular); ?>	    						
	    					</td>
	    					<td>
	    						<?php echo e($servicioscontratista->contratista); ?>	    						
	    					</td>
	    					<td>
	    						<a href=<?php echo e(route('solicitudes.show',$servicioscontratista->id)); ?> class="btn btn-primary a-btn-slide-text"  title="Solicitar"><span class="glyphicon glyphicon-calendar" aria-hidden="true" ></span></a>
	    					</td>
	    				</tr>
	    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appGeneral', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
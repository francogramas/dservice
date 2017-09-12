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
				<?php echo e(str_limit($servicioscontratista->descripcion,50	,'...')); ?>

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
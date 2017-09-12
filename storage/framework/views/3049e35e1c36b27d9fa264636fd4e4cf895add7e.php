<?php $__env->startSection('content'); ?>
<div class="container">
		<div class="row">
			<div class="col-sm-7">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
			<h4>Solicitudes pendientes</h4>
				<div id="tablaSolicitudes">
					<table class="table">
						<thead>
							<tr>
								<td>								
								</td>
								<td><b>Usuario</b></td>
								<td><b>Servicio</td>
								<td><b>Prestador</td>
								<td><b>Fecha/hora</td>							
								<td><b>Estado</td>
								<td><b>Sede</td>
							</tr>
						</thead>
						<tbody>
						<?php $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>
									<a href="#" class="btn btn-primary a-btn-slide-text SolicitudId"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<input type="hidden" value=<?php echo e($solicitud->id); ?>>								
								</td>
								<td><?php echo e($solicitud->name); ?></td>
								<td><?php echo e($solicitud->servicio); ?></td>
								<td><?php echo e($solicitud->contratista); ?></td>
								<td><?php echo e($solicitud->fecha.' '.$solicitud->hora); ?></td>
								<td><?php echo e($solicitud->estado); ?></td>
								<td><?php echo e($solicitud->ciudad); ?></td>							
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-4">
				<div id="detalleSolicitud"></div>
			</div>
		</div>		
		<div class="row">
			<div class="col-sm-7"></div>
		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
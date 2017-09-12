<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row  form-group">
		<?php echo e(Form::open(['route' => 'sedes.store','method'=>'POST'])); ?>		
			<div class="col-md-6">
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="estado">Departamento/estado</label>
    					<?php echo e(Form::select('departamentos',$estados,null,['id'=>'departamentos','class'=>'form-control'])); ?>

					</div>
					<div class="col-sm-6">
						<label for="ciudad">Ciudad</label>
    					<?php echo e(Form::select('ciudades_id',$ciudades,null,['id'=>'ciudades_id','class'=>'form-control'])); ?>

					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Dirección</label>
						<?php echo e(Form::text('direccion',null,['id'=>'direccion','class'=>'form-control', 'required'])); ?>

					</div>
					<div class="col-sm-6">
						<label for="">Teléfonos</label>
						<?php echo e(Form::text('telefonos',null,['id'=>'telefonos','class'=>'form-control', 'required'])); ?>

					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Correo</label>
						<?php echo e(Form::email('email',null,['id'=>'email','class'=>'form-control', 'required', 'type'=>'email'])); ?>

					</div>
					<div class="col-sm-6">
					<label for=""><br></label>
						<input type="submit" class="btn btn-primary form-control" value="Crear">
					</div>
				</div>
			</div>			
		<?php echo e(Form::close()); ?>


		<div class="col-md-6">
			<table class="table">
			<caption><h3>Sedes</h3></caption>
				<thead>
					<tr>
						<td>Ciudad </td>
						<td>Teléfonos</td>
						<td>Correo</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<tr>
						<td><?php echo e($sede->ciudad); ?></td>
						<td><?php echo e($sede->telefonos); ?></td>
						<td><?php echo e($sede->email); ?></td>
						<td>
														    						
							<?php echo e(Form::open(['route' => ['sedes.destroy',$sede->id],'method'=>'DELETE'])); ?>

								<a href=<?php echo e(route('sedes.show',$sede->id)); ?> class="btn btn-primary a-btn-slide-text"  title="Editar">
									   <span class="glyphicon glyphicon-edit" aria-hidden="true" ></span>            
								</a>
							  	<button type="submit" class="btn btn-danger a-btn-slide-text" title="Borrar">
							 		<span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>
							    </button>
							<?php echo e(Form::close()); ?>

						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
				</tbody>
			</table>
		</div>
	</div>
	<div class="row  form-group">
		<div class="col-md-2"></div>
		<div class="col-md-6">
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
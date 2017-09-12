<script type="text/javascript">
	$(document).ready(function() {
		$(".SolicitudId").click(function(event) {
	    var _solicitud = $('input[type=hidden]', $(this).closest("td")).val();
	    $.get('/admin/solicituddetalle/'+_solicitud, function(data) {
	        $("#detalleSolicitud").empty().html(data);       
	     }); 
	  });
	});
</script>

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
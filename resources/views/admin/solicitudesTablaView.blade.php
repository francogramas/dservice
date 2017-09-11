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
	@foreach ($solicitudes as $solicitud)
		<tr>
			<td>
				<a href="#" class="btn btn-primary a-btn-slide-text SolicitudId"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
				<input type="hidden" value={{ $solicitud->id }}>
			</td>
			<td>{{ $solicitud->name }}</td>
			<td>{{ $solicitud->servicio }}</td>
			<td>{{ $solicitud->contratista }}</td>
			<td>{{ $solicitud->fecha.' '.$solicitud->hora }}</td>
			<td>{{ $solicitud->estado }}</td>
			<td>{{ $solicitud->ciudad }}</td>			
		</tr>
	@endforeach	
	</tbody>
</table>
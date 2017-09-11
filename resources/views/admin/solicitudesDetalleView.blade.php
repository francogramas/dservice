<script type="text/javascript">
  	$(document).ready(function() {
  		$("#btnCancelarOrden").click(function(event) {
  			$.trim('string')

  			var _solicitud = $("#solicitudes_id").val();
  			var _motivocancelacion = $("#motivoCancelacion").val();
    		var token=$("input[name=_token]").val();

  			$.ajax({
  				url: '/admin/admsolicitudes/'+_solicitud,
      			headers:{'X-CSRF-TOKEN':token},  				
  				type: 'PUT',
  				dataType: 'json',
  				data: {motivocancelacion: _motivocancelacion, estadosolicitudes_id:5},
  			})
  			.done(function() {
  				$.get('/admin/mostrarsolicitudes', function(data) {
  					$('#tablaSolicitudes').empty().html(data);
  				});
  				$('#cancelarOrdenModal').modal('hide');
  				$('#panelDetalle').empty();
  				$('#motivoCancelacion').val('');
  			})
  			.fail(function() {
  				$('#mensaje').empty();
  				$('#mensaje').html('<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> No se pudo guardar la solicitud por problemas de conexión al servidor, por favor intente nuevamente.</div>');
  			});
  		});
  	});
  </script>
{{ csrf_field() }}
<div id="panelDetalle">
	<div class="panel panel-primary">
	  <div class="panel-heading">Detalles y seguimiento de solicitud</div>
	  <div class="panel-body">
		<div class="form-group">
			<label for="">Usuario: </label>
			{{ $solicitudes->usuario }}
		</div>
		<div class="form-group">
			<label for="">Teléfono de contacto del usuario: </label>
			{{ $solicitudes->phone }}		
		</div>
		<div class="form-group">
			<label for="">Prestador de servicio: </label>
			{{ $solicitudes->contratista }}		
		</div>
		<div class="form-group">
			<label for="">Teléfono de contacto del prestador: </label>
			{{ $solicitudes->telefono }}				
		</div>
		<div class="form-group">
			<label for="">Servicio: </label>
			{{ $solicitudes->nombre }}
		</div>
		<div class="form-group">
			<label for="">Posible fecha: </label>
			{{ $solicitudes->fecha }}				
		</div>
		<div class="form-group">
			<label for="">Posible Hora: </label>
			{{ $solicitudes->hora }}
		</div>	
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6"><button id="btnCancelar" class="btn btn-warning form-control" title="Cancelar Orden" data-toggle="modal" data-target="#cancelarOrdenModal"><span class="glyphicon"></span>Cancelar Orden</button></div>
				<div class="col-sm-6"><button id="btngenerarOrden" class="btn btn-success form-control" title="Generar orden" data-toggle="modal" data-target="#generarOrdenModal"><span class="glyphicon"></span>Generar Orden</button></div>
			</div>
		</div>
	  </div>  
	</div>
</div>
<div>
	<input type="hidden" id="solicitudes_id" value={{ $solicitudes->id }}>
</div>
<div class="modal fade" id="cancelarOrdenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-warning">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
				<h4 class="modal-title" id="myModalLabel">Cancelar Orden</h4>
			</div>
			<div class="modal-body">
				<div class="row from-group">
					<div class="col-sm-12">
						<textarea id="motivoCancelacion" cols="30" rows="5" class="form-control" placeholder="Escriba el motivo de cancelación"></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12" id="mensaje">
						
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12">
						<br>
						<button type="button" id="btnCancelarOrden" class="btn btn-warning form-control">Cancelar</button>						
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
<div class="modal fade" id="generarOrdenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
				<h4 class="modal-title" id="myModalLabel">Generar Orden</h4>
			</div>
			<div class="modal-body">
				<div class="row form-group">
					<div class="col-sm-12">
						<label for="">Prestador del Servicio: </label>
						<input type="text" class="form-control" value="{{ $solicitudes->contratista }}" >
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12">
						<label for="">Servicio: </label>
						<input type="text" class="form-control" value="{{ $solicitudes->nombre }}">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Fecha:</label>
						<input type="text" class="form-control datepicker" value="{{ $solicitudes->fecha }}">
					</div>
					<div class="col-sm-6">
						<label for="">Hora:</label>
						<input type="text" class="form-control" value="{{ $solicitudes->hora }}">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12">
						<button class="btn btn-success form-control " id="btnAgendar" data-dismiss="modal">Agendar</button>
					</div>
				</div>
			</div>			
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
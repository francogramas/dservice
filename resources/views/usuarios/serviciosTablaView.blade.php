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
	@foreach ($servicioscontratistas as $servicioscontratista)
		<tr>
			<td>
				{{ $servicioscontratista->nombre }}
				<br>
				{{ str_limit($servicioscontratista->descripcion,50	,'...') }}
			</td>
			<td>
				{{ $servicioscontratista->tarifaparticular }}				
			</td>
			<td>
				{{ $servicioscontratista->contratista }}				
			</td>
			<td>
				<a href={{ route('solicitudes.show',$servicioscontratista->id) }} class="btn btn-primary a-btn-slide-text"  title="Solicitar"><span class="glyphicon glyphicon-calendar" aria-hidden="true" ></span></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
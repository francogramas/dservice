<table class="table">
	<thead>
		<tr>
			<td>Servicio</td>
			<td>Valor</td>
			<td>Contratista</td>
		</tr>
	</thead>
	<tbody>
	@foreach ($servicioscontratistas as $servicioscontratista)
		<tr>
			<td>
				{{ $servicioscontratista->nombre }}
			</td>
			<td>
				{{ $servicioscontratista->tarifaparticular }}				
			</td>
			<td>
				{{ $servicioscontratista->contratista }}				
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
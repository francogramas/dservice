@extends('layouts.app')
@section('content')
<div class="container">
		<div class="row">
			<div class="col-sm-7">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
			<h4>Solicitudes pendientes</h4>
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
			</div>
			<div class="col-md-3">
				<h4>Detalle de solicitud</h4>
			</div>
		</div>		
		<div class="row">
			<div class="col-sm-7"></div>
		</div>
</div>
@stop
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row  form-group">
		<div class="col-md-5">			
			{{  Form::open(['route' => 'servicioscontratistas.store','method'=>'POST']) }}			
				<div class="row form-group">
					<div class="row form-group">
						<div class="col-sm-12">
							<label for="">Contratista</label>
							<input type="text" class="form-control" id="Buscarcontratistas">
							{{ Form::hidden('contratistas_id',null,['id'=>'contratistas_id']) }}							
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-12">
							<label for="">Nombre de servicio</label>
							{{ Form::text('nombre',null,['id'=>'nombre','class'=>'form-control', 'required']) }}							
						</div>
					</div>
					<div class="row form-group">					
						<div class="col-sm-12"><label for="">Descripción</label>
							{{ Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control', 'required']) }}							
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-6"><label for="">Tarifa</label>
							{{ Form::number('tarifaparticular',null,['id'=>'tarifaparticular','class'=>'form-control', 'required', 'step'=>'0.1']) }}
						</div>
						<div class="col-sm-6"><label for="">Costo</label>
							{{ Form::number('ingresoconvenio',null,['id'=>'ingresoconvenio','class'=>'form-control', 'required', 'step'=>'0.1']) }}
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-12">
							<input type="submit" class="btn btn-primary form-control" value="Guardar">
						</div>
					</div>					
				</div>
			{{ Form::close() }}
		</div>
		<div class="col-md-7">
			<table class="table">
				<thead>
					<tr>
						<td>Contratista</td>
						<td>Servicio</td>
						<td>Costo</td>
						<td>Tarifa</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
				@foreach ($servicioscontratistas as $servicioscontratista)
					<tr>
						<td>{{ $servicioscontratista->contratista }}</td>
						<td>{{ $servicioscontratista->nombre }}</td>
						<td>{{ $servicioscontratista->ingresoconvenio }}</td>
						<td>{{ $servicioscontratista->tarifaparticular }}</td>
						<td>
							{{ Form::open(['route' => ['servicioscontratistas.destroy',$servicioscontratista->id],'method'=>'DELETE']) }}
								<a href={{ route('servicioscontratistas.show',$servicioscontratista->id) }} class="btn btn-primary a-btn-slide-text"  title="Ver">
									   <span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span>            
								</a>
								<a href={{ route('servicioscontratistas.edit',$servicioscontratista->id) }} class="btn btn-primary a-btn-slide-text"  title="Editar">
									   <span class="glyphicon glyphicon-edit" aria-hidden="true" ></span>            
								</a>
							  	<button type="submit" class="btn btn-danger a-btn-slide-text" title="Borrar">
							 		<span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>
							    </button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach					
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
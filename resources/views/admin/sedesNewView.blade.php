@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row  form-group">
		{{  Form::open(['route' => 'sedes.store','method'=>'POST']) }}		
			<div class="col-md-6">
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="estado">Departamento/estado</label>
    					{!! Form::select('departamentos',$estados,null,['id'=>'departamentos','class'=>'form-control']) !!}
					</div>
					<div class="col-sm-6">
						<label for="ciudad">Ciudad</label>
    					{!! Form::select('ciudades_id',$ciudades,null,['id'=>'ciudades_id','class'=>'form-control']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Dirección</label>
						{!! Form::text('direccion',null,['id'=>'direccion','class'=>'form-control', 'required']) !!}
					</div>
					<div class="col-sm-6">
						<label for="">Teléfonos</label>
						{!! Form::text('telefonos',null,['id'=>'telefonos','class'=>'form-control', 'required']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Correo</label>
						{!! Form::email('email',null,['id'=>'email','class'=>'form-control', 'required', 'type'=>'email']) !!}
					</div>
					<div class="col-sm-6">
					<label for=""><br></label>
						<input type="submit" class="btn btn-primary form-control" value="Crear">
					</div>
				</div>
			</div>			
		{{ Form::close() }}

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
				@foreach ($sedes as $sede)
					{{-- expr --}}
					<tr>
						<td>{{ $sede->ciudad }}</td>
						<td>{{ $sede->telefonos }}</td>
						<td>{{ $sede->email }}</td>
						<td>
														    						
							{{ Form::open(['route' => ['sedes.destroy',$sede->id],'method'=>'DELETE']) }}
								<a href={{ route('sedes.show',$sede->id) }} class="btn btn-primary a-btn-slide-text"  title="Editar">
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
	<div class="row  form-group">
		<div class="col-md-2"></div>
		<div class="col-md-6">
		</div>
	</div>
</div>
@stop
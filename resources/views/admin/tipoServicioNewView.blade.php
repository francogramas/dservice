@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row  form-group">
		{{  Form::open(['route' => 'categorias.store','method'=>'POST']) }}		
			<div class="col-md-4">
				{{ Form::text('nombre',null,['id'=>'nombre','required'=>'required','class'=>'form-control','placeholder'=>'Nueva categoría']) }}			
			</div>
			<div class="col-md-2">
				<input type="submit" class="btn btn-primary form-control" value="Crear">			
			</div>
		{{ Form::close() }}

		<div class="col-md-6">
			<table class="table">
			<caption>Servicios incluidos</caption>
				<thead>
					<tr>
						<td><h4>Categoría</h4> </td>
						<td></td>
						<td></td>
					</tr>
				</thead>
				<tbody>
				@foreach ($tiposervicios as $tiposervicio)
					{{-- expr --}}
					<tr>
						<td>{{ $tiposervicio->nombre }}</td>
						<td>
														    						
							{{ Form::open(['route' => ['categorias.destroy',$tiposervicio->id],'method'=>'DELETE']) }}
								<a href={{ route('categorias.show',$tiposervicio->id) }} class="btn btn-primary a-btn-slide-text" title="Editar">
									   <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>            
								</a>
							  	<button type="submit" class="btn btn-danger a-btn-slide-text" title="Borrar">
							 		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
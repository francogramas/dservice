@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row  form-group">	
		{!! Form::model($sedes, ['route' => ['sedes.update',$sedes->id],'method'=>'PUT']) !!}
			<div class="col-md-6">
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="estado">Departamento/estado</label>
    					{!! Form::select('departamentos',$estados,$sedes->estados,['id'=>'departamentos','class'=>'form-control']) !!}
					</div>
					<div class="col-sm-6">
						<label for="ciudad">Ciudad</label>
    					{!! Form::select('ciudades_id',$ciudades,$sedes->ciudades_id,['id'=>'ciudades_id','class'=>'form-control']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Dirección</label>
						{!! Form::text('direccion',$sedes->direccion,['id'=>'direccion','class'=>'form-control', 'required']) !!}
					</div>
					<div class="col-sm-6">
						<label for="">Teléfonos</label>
						{!! Form::text('telefonos',$sedes->telefonos,['id'=>'telefonos','class'=>'form-control', 'required']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Correo</label>
						{!! Form::email('email',$sedes->email,['id'=>'email','class'=>'form-control', 'required', 'type'=>'email']) !!}
					</div>
					<div class="col-sm-6">
					<label for=""><br></label>
						<input type="submit" class="btn btn-primary form-control" value="Actualizar">
					</div>
				</div>
			</div>			
		{{ Form::close() }}
	</div>
</div>
@stop
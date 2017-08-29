@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row  form-group">
		<div class="col-md-5">			
			{{  Form::model($contratistas, ['route' => ['contratistas.update',$contratistas->id],'method'=>'PUT']) }}
			
				<div class="row form-group">
					<div class="col-sm-12">
						<label for="">Sede</label>
	    				{!! Form::select('sedes_id',$sedes,$contratistas->sedes_id,['id'=>'sedes_id','class'=>'form-control']) !!}
	    			</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Tipo se servicios</label>
    					{!! Form::select('tiposervicios_id',$tiposervicios,$contratistas->tiposervicios_id,['id'=>'tiposervicios_id','class'=>'form-control']) !!}
					</div>
					<div class="col-sm-6">
						<label for="">Nit</label>
						{!! Form::text('codigo',$contratistas->codigo,['id'=>'codigo','class'=>'form-control', 'required']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Razón social</label>
						{!! Form::text('nombre',$contratistas->nombre,['id'=>'nombre','class'=>'form-control', 'required']) !!}
					</div>
					<div class="col-sm-6">
						<label for="">Descripción</label>
						{!! Form::text('descripcion',$contratistas->descripcion,['id'=>'descripcion','class'=>'form-control', 'required']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Departamento/estado</label>
    					{!! Form::select('departamentos',$estados,$contratistas->estados,['id'=>'departamentos','class'=>'form-control']) !!}
					</div>
					<div class="col-sm-6">
						<label for="">Ciudad</label>
    					{!! Form::select('ciudades_id',$ciudades,$contratistas->ciudades_id,['id'=>'ciudades_id','class'=>'form-control']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Dirección</label>
						{!! Form::text('direccion',$contratistas->direccion,['id'=>'direccion','class'=>'form-control', 'required']) !!}
					</div>
					<div class="col-sm-6">
						<label for="">Teléfono</label>
						{!! Form::text('telefono',$contratistas->telefono,['id'=>'telefono','class'=>'form-control', 'required']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
						<label for="">Correo</label>
						{!! Form::email('correo',$contratistas->correo,['id'=>'correo','class'=>'form-control', 'required']) !!}
					</div>
					<div class="col-sm-6">
						<label for="">Dirección Web</label>
						{!! Form::email('web',$contratistas->web,['id'=>'web','class'=>'form-control', 'required']) !!}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12">
						<label for=""></label>
							<button type="submit" class="btn btn-primary form-control">Actualizar</button>	
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop
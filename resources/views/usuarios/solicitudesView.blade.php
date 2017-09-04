@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row  form-group">
		{{  Form::open(['route' => 'solicitudes.store','method'=>'POST']) }}
		{{ csrf_field() }}
		<div class="row">
			<div class="col-sm-3">
				<label for="">Prestador del servicio</label> <br>
				{{ $servicioscontratistas->contratista }}
			</div>
			<div class="col-sm-3">
				<label for="">Servicio</label> <br>
				{{ $servicioscontratistas->nombre }}
				{{ Form::hidden('servicioscontratistas_id',$servicioscontratistas->id,['id'=>'servicioscontratistas_id']) }}
				{{ Form::hidden('users_id',0,['id'=>'users_id']) }}

			</div>
			<div class="col-sm-3">
				<label for="">Valor</label> <br>
				{{ $servicioscontratistas->tarifaparticular }}
			</div>
			<div class="col-sm-3">
				
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="">Fecha</label>
				{{ Form::date('fecha',null,['id'=>'fecha','class'=>'form-control datepicker', 'required']) }}
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6">
			<label for="">Hora:</label>
				{{ Form::time('hora',null,['id'=>'hora','class'=>'form-control', 'required']) }}			
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6">
				<input type="submit" class="btn btn-primary" value="Solicitar">
			</div>
		</div>		
		{{ 	Form::close() }}
	</div>
</div>
@stop
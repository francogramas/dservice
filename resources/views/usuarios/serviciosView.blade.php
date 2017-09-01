@extends('layouts.appGeneral')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Nuestros servicios</h4></div>
        <div class="panel-body">
	        <div class="row">
		        <div class="col-md-10 col-md-offset-1 form-group">
	                <input id="serviciosContratistas" type="text" class="form-control" placeholder="Buscar en nuestra red de servicios">
	                <input type="hidden" id="servicioscontratistas_id">
	             </div>
	        </div>

	    </div>
	    <div class="row">
	    	<div class="col-sm-10">
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
	    	</div>
	    </div>
	</div>
@stop

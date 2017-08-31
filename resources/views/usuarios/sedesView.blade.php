@extends('layouts.appGeneral')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Nuestras zonas</h4></div>
        <div class="panel-body">
	        <div class="row">
	        @foreach ($sedes as $sede)
            <div class="col-md-3 form-group">
                   <a href={{ route('ususedes.show',$sede->id) }} class="btn btn-primary form-control">
                        {{ $sede->name }}
                    </a>
            </div>
        @endforeach
	        </div>
    	</div>
	</div>
@stop
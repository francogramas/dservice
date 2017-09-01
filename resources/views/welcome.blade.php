@extends('layouts.appGeneral')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Nuestros servicios</h4></div>
        <div class="panel-body">
        <div class="row">
        @foreach ($tiposervicios as $tiposervicio)
            <div class="col-md-3 form-group">
                   <a href={{ route('servicios.show',$tiposervicio->id) }} class="btn btn-primary form-control">
                        {{ $tiposervicio->nombre }}
                    </a>
            </div>
        @endforeach
        </div>
    </div>
@endsection

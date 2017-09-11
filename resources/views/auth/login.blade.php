<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dservices') }}</title>    
    <!-- Local Resources-->
        <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/form-elements.css') }}">
        <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
    <!-- External Resources -->
        <!-- Google Fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<!-- Top content -->
<div class="top-content">
    <div class="container">
        <!-- Cabecera -->
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text">
                <h1>D Service</h1>
                    <div class="description">
                        <p>
                            Agenda cita con los mejores medicos especialistas de una forma rapida y mas economica.</br>
                            Inicia sesion para poder empezar!
                            Si aun no tienes tu cuenta <a href={{ url('register') }}>Registrate</a>.
                        </p>
                    </div>
            </div>
        </div>
        <!-- Tab Inicio /Registro -->
        <div class="row">
                <div class="col-sm-10 col-sm-offset-1 show-forms">
                    <span class="show-register-form active">Registro</span> 
                    <span class="show-forms-divider">/</span> 
                    <span class="show-login-form">Inicio</span>
                </div>
        </div>
        <!-- Row de Registro -->
        <div class="row register-form">
            <div class="col-sm-4 col-sm-offset-1">
                <form role="form" action="{{ route('register') }}" method="post" class="r-form">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <!-- Errores -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"></div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"></div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"></div>
                        <!-- Nombre -->
                        <label class="sr-only" for="r-form-name">Nombre Completo</label>
                        <input id="name" type="text" class="form-control" placeholder="Nombres" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>
                        <!-- eMail -->
                        <div class="form-group">
                        <label class="sr-only" for="r-form-email">Email</label>
                        <input id="r-form-email" type="text" class="form-control" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- Contraseña -->
                        <div class="form-group">
                        <label class="sr-only" for="r-form-password">Contraseña</label>
                        <input type="password" name="password" placeholder="Contraseña" class="r-form-email form-control" id="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        </div>
                        <!-- Confirmacion -->
                        <div class="form-group">
                        <label class="sr-only" for="r-form-confirm">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn">Registrarse!</button>
                </form>
            </div>
        <!-- Notas de Version -->
            <div class="col-sm-6 forms-right-icons">
                <div align="center">
                    <h3>Notas de Version</h3>
                </div>
                <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-pencil"></i></div>
                <div class="col-sm-10">
                    <h3>Nuevo sistema de Registro e Inicio</h3>
                    <p>Presentamos un nuevo diseño mas amigable y elegante.</p>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-plus"></i></div>
                <div class="col-sm-10">
                    <h3>Nuevo sistema de registro</h3>
                    <p>Agrega  y edita Profesionales, Sedes, Servicios.</p>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-magic"></i></div>
                <div class="col-sm-10">
                    <h3>Cambios Generales</h3>
                    <p>Hemos conectado un par de nuevas funciones para ti.</p>
                </div>
                </div>
            </div>
        </div>
        <!-- Row de Inicio -->
        <div class="row login-form">
            <div class="col-sm-4 col-sm-offset-1">
                <form role="form" action="" method="post" class="l-form">
                    <div class="form-group">
                        <label class="sr-only" for="l-form-username">Email</label>
                        <input type="text" name="l-form-username" placeholder="Email..." class="l-form-username form-control" id="l-form-username">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="l-form-password">Contraseña</label>
                        <input type="password" name="l-form-password" placeholder="Password..." class="l-form-password form-control" id="l-form-password">
                    </div>
                    <button type="submit" class="btn">Inicio!</button>
                </form>
        <!-- Row Social -->
            <div class="social-login">
            <i>PROXIMAMENTE: Inicia con tus redes sociales:</i>
                <div class="social-login-buttons">
                    <a class="btn btn-link-1" href=""><i class="fa fa-facebook"></i></a>
                    <a class="btn btn-link-1" href=""><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-link-1" href=""><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
            </div>
        <!-- Notas de la version -->
        <div class="col-sm-6 forms-right-icons">
            <div class="row">
            <div class="col-sm-2 icon"><i class="fa fa-pencil"></i></div>
                <div class="col-sm-10">
                    <h3>Nuevo sistema de Registro e Inicio</h3>
                    <p>Presentamos un nuevo diseño mas amigable y elegante.</p>
                </div>
            </div>

            <div class="row">
            <div class="col-sm-2 icon"><i class="fa fa-plus"></i></div>
            <div class="col-sm-10">
                <h3>Nuevo sistema de registro</h3>
                <p>Agrega  y edita Profesionales, Sedes, Servicios.</p>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-2 icon"><i class="fa fa-magic"></i></div>
            <div class="col-sm-10">
                <h3>Cambios Generales</h3>
                <p>Hemos conectado un par de nuevas funciones para ti.</p>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer>
<div class="container">
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
    <div class="footer-border"></div>
        <p><a href="" target="_blank">DService 2017</a>.</p>
    </div>                    
</div>
</div>
</footer>
<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>
<!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
<![endif]-->
</body>
</html>
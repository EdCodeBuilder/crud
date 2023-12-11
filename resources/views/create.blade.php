<!DOCTYPE html>
<html>
<head>
    <title>Crud usuarios App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('users') }}">Alerta usuario</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">Ver todos los usuarios</a></li>
        <li><a href="{{ URL::to('users/create') }}">Crear un usuario</a>
    </ul>
</nav>

<h1>Crear un usuario</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'users')) }}

    <div class="form-group">
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('nombre_completo', 'Nombre_completo') }}
        {{ Form::text('nombre_completo', Input::old('nombre_completo'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('edad', 'Edad') }}
        {{ Form::number('edad', Input::old('edad'), array('class' => 'form-control'))  }}
    </div>

    <div class="form-group">
        {{ Form::label('sexo', 'Sexo') }}
        {{ Form::select('sexo', ['H' => 'Hombre', 'M' => 'Mujer'], null, ['placeholder' => 'Selecciona una opción...'])  }}
    </div>

    <div class="form-group">
        {{ Form::label('direccion', 'Direccion') }}
        {{ Form::text('direccion', Input::old('direccion'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Crea el usuario!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>

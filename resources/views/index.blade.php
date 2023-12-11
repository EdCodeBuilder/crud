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

<h1>Todos los usuarios</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Nombre completo</td>
            <td>Edad</td>
            <td>Sexo</td>
            <td>Dirección</td>
            <td>Fecha de creación</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->nombre_completo }}</td>
            <td>{{ $value->edad }}</td>
            <td>{{ $value->sexo }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->fecha_creacion }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Muestra este usuario</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edita este usuario</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>

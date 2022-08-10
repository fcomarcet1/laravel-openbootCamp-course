<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('js/bootstrap/bootstrap.bundle.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <title>{{env('APP_NAME')}}|Contacto</title>
</head>
<body>
<h1>CONTACT PAGE</h1>
<form action="{{ route('my-first-page.contactProcess') }}" method="post" autocomplete="on">
    @method('POST')
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" >
    </div>
    <div class="form-group">
        <label for="telephone">Telefono</label>
        <input type="tel" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" placeholder="Enter name" >
        <small>Ej 666 66 66 66</small>
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" rows="3" >{{ old('message') }}</textarea>
    </div>
    <br/>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<hr/>
<a href="{{ route('my-first-page.home') }}">Return to Home page</a>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>

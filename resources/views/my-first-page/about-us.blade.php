<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome {{ $user }}</h1>
<nav>
    <ul>
        <li><a href="{{ route('my-first-page.home') }}">Home</a></li>
        @if($section === 'about-us')
            <li><a href="{{ route('my-first-page.about-us') }}" style="color: #1e7e34" >About Us</a></li>
        @endif
        <li><a href="{{ route('my-first-page.contact') }}">Contact</a></li>
    </ul>
</nav>
    <p> Hola mi nombre es {{ $name }}, tengo {{ $age }} años, vivo en {{ $country }} y mi profesion es {{ $profession}}</p>
@if($user !== 'Usuario')
    <h3>Personaliza la pagina</h3>
    <form action="{{ route('my-first-page.personalize') }}" method="post">
        @csrf
        @method('POST')
        <label for="name">Nombre</label>
        <input type="text" name="name" placeholder="Introduce tu nombre...">
        <input type="submit" value="Personalizar">
    </form>
@endif


    <a href="{{ route('my-first-page.home') }}">Return to Home page</a>
</body>
</html>

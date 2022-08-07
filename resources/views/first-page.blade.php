<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1> {{ env('APP_NAME') }}</h1>
        <p> Mi nombre es: {{ $name }} </p>
        <h4> ¿Que hemos visto: ?</h4>
        <ul>
            @foreach ($lessons as $lesson)
                <li> {{ $lesson }} </li>
            @endforeach
        </ul>
    </body>
</html>

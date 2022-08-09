<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <h1>Introduccion a blade templates</h1>
    @php
        $holaMundo = 'Hola mundo';
        $holaMundoHtmlScape = '<h1>Hola mundo</h1>';
    @endphp
    {{ $holaMundo }}
    {!! $holaMundoHtmlScape !!}
    {{-- Comentario de una linea --}}

    {{--blade directives --}}
    @include()
    @extends()
    @if() @elseif() @else @endif
    @while() @endwhile
    @for() @endfor
    @foreach() @endforeach
    @switch() @endswitch
    @auth @endauth
    @guest @endguest
    @method()
    @csrf()

    {{ route ('route_name', ['var1' => 1, 'var2' => 'test']) }}




</body>
</html>

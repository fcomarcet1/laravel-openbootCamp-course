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
    <h1>HOME PAGE</h1>
    <a href="{{ route('contact.index') }}">Contact</a>
    <a href="{{ route('about') }}">About Us</a>
</body>
</html>

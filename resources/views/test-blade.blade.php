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
    <h1>Test blade</h1>
    <h3> Fecha actual: {{ $today }}</h3>
    <h4>Timestamp: {{ $timestamp }}</h4>
</body>
    <script>
        var jsonConcepts = JSON.parse('{!! $jsonConcepts !!}');
    </script>
</html>

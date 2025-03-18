<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon - {{$pokemon['name']}}</title>
</head>
<body>
    <h1>{{$pokemon['name']}}</h1>
    <img src="{{ $pokemon['image'] }}" alt="">
</body>
</html>
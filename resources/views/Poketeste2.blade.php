<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemons</title>
</head>
<body class="grid">
    @forelse ($pokemons as $pokemon)
        <div>
            <h1>{{$pokemon['name']}}</h1>
            <img src="{{ $pokemon['image'] }}" alt="">
        </div>
    @empty
    @endforelse

    <style>
        body{
            padding: 0;
            margin: 0;
        }

        .grid{
            display: grid;
            grid-template-columns: repeat(5, 200px);
            gap: 100px 100px;
            justify-content: center;
        }

        .grid div{
            background-color: #f3f3f3;
        }


    </style>
</body>
</html>

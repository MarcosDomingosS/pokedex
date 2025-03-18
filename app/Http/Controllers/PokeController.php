<?php

namespace App\Http\Controllers;

use App\Services\PokeApiService;

class PokeController extends Controller
{
    protected $pokeApiService;

    public function __construct(PokeApiService $pokeApiService)
    {
        $this->pokeApiService = $pokeApiService;
    }

    public function show($id)
    {
        $pokemonData = $this->pokeApiService->getPokemon($id);

        if (isset($pokemonData['error'])) {
            return response()->json(['error' => 'Pokemon not found'], 404);
        }


        $pokemon = [
            'name' => $pokemonData['name'],
            'image' => $pokemonData['sprites']['front_default']
        ];
        return view('Poketeste', ['pokemon' => $pokemon]);
    }

    public function elaborate(){
        $pokemons = [];
        set_time_limit(300); // Aumenta o tempo de execução para 60 segundos


        for($i = 1; $i<=1025;  $i++){
            $pokemonData = $this->pokeApiService->getPokemon($i);
            $pokemons = $pokemons + [$i => ['name' => $pokemonData['name'], 'image' => $pokemonData['sprites']['front_default']]];
        }

        return view('Poketeste2', ['pokemons' => $pokemons]);
    }
}


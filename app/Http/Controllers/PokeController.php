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

    public function show($name)
    {
        $pokemonData = $this->pokeApiService->getPokemon($name);

        if (isset($pokemonData['error'])) {
            return response()->json(['error' => 'Pokemon not found'], 404);
        }


        $pokemon = [
            'name' => $pokemonData['name'],
            'image' => $pokemonData['sprites']['front_default']
        ];
        return view('Poketeste', ['pokemon' => $pokemon]);
    }
}


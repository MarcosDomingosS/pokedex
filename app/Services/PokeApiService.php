<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PokeApiService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPokemon($name)
    {
        try {
            $response = $this->client->request('GET', "https://pokeapi.co/api/v2/pokemon/{$name}");
            $data = json_decode($response->getBody(), true);

            return $data; // Retorna os dados do Pokémon
        } catch (RequestException $e) {
            return ['error' => 'Pokemon not found or API error.'];
        }
    }
}

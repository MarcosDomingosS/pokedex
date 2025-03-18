<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

class PokeApiService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPokemon($id)
    {
        try {
            $response = $this->client->request('GET', "https://pokeapi.co/api/v2/pokemon/{$id}");
            $data = json_decode($response->getBody(), true);

            return $data; // Retorna os dados do Pokémon
        } catch (RequestException $e) {
            Log::error("Erro ao buscar Pokémon: " . $e->getMessage());

            return [
                'error' => 'Pokemon not found',
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            ];
        }
    }
}

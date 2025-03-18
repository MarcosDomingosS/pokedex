<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokeController;


Route::get('/', [PokeController::class, 'elaborate']);

Route::get('/pokemon/{id}', [PokeController::class, 'show']);

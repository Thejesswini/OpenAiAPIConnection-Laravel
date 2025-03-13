<?php

use App\Http\Controllers\OpenAiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ask', [OpenAiController::class,'index']);
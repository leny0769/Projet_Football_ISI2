<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ChampionnatController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JoueurController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pay',PayController::class);
Route::resource('championnats',ChampionnatController::class);
Route::resource('clubs',ClubController::class);
Route::resource('joueurs',JoueurController::class);
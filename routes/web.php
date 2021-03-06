<?php

use App\Http\Controllers\EspecieController;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

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

Route::Resources([
    "especie" => EspecieController::class,
    "animal" => AnimalController::class
]);


Route::get('/', function () {
    return view('welcome');
});

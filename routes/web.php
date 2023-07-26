<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth.basic', 'throttle:10,1'])->group(function () {

    Route::get('/teams/sync/xml', [TeamController::class, 'xmlSync']);
    Route::get('/teams/sync', [TeamController::class, 'sync']);

});

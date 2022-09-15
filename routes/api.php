<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\ConcertsController;
use App\Http\Controllers\v1\SeatingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('v1/concerts', [ConcertsController::class, 'index']);
Route::get('v1/concerts/{concertID}', [ConcertsController::class, 'show']);
Route::get('v1/concerts/{concertID}/shows/{showID}/seating', [SeatingController::class, 'index']);
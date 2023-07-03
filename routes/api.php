<?php

use App\Http\Controllers\API\AnnonceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/annonces',[AnnonceController::class,'index']) ;
Route::post('/annonce/store',[AnnonceController::class,'store']) ;
Route::get('/annonce/{id}',[AnnonceController::class,'show']) ;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

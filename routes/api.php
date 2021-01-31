<?php

use App\Http\Controllers\ElectionController;
use App\Http\Controllers\VoterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'election'], function(){

    Route::get('/', [ElectionController::class, 'index'])->name('election.index');
    Route::post('/', [ElectionController::class, 'store'])->name('election.store');
    Route::get('/{id}', [ElectionController::class, 'show'])->name('election.show');
    Route::put('/{id}', [ElectionController::class, 'update'])->name('election.update');
    Route::delete('/{id}', [ElectionController::class, 'destroy'])->name('election.destroy');


    Route::group(['prefix' => '{id}'], function(){
        Route::get('/voters', [ElectionController::class, 'voters'])->name('election.voters');
    });



});

// Route::group(['prefix' => 'voters'], function(){
//     Route::get('/', [VoterController::class, 'index'])->name('voters.index');
// });
<?php

use App\Http\Controllers\API\NoticesController;
use App\Http\Controllers\API\AuthorController;
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

Route::get('/notices', [NoticesController::class, "index"])->name('notices.index');
Route::get('/notices/{id}', [NoticesController::class, "show"])->name('notices.show');
Route::post('/notices', [NoticesController::class, "store"])->name('notices.store');
Route::put('/notices/{id}', [NoticesController::class, "update"])->name('notices.update');
Route::delete('/notices/{id}', [NoticesController::class, "delete"])->name('notices.delete');

Route::get('/author', [AuthorController::class, "index"])->name('author.index');
Route::get('/author/{id}', [AuthorController::class, "show"])->name('author.show');
Route::post('/author', [AuthorController::class, "store"])->name('author.store');
Route::put('/author/{id}', [AuthorController::class, "update"])->name('author.update');
Route::delete('/author/{id}', [AuthorController::class, "delete"])->name('.authordelete');


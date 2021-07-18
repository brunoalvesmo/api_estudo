<?php

use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\NoticesController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\PersonController;
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
Route::get('/notices/{id}', [NoticesController::class, "show"])->name('notices.show')->where('id', '[0-9]+');
Route::post('/notices', [NoticesController::class, "store"])->name('notices.store');
Route::put('/notices/{id}', [NoticesController::class, "update"])->name('notices.update')->where('id', '[0-9]+');
Route::delete('/notices/{id}', [NoticesController::class, "delete"])->name('notices.delete')->where('id', '[0-9]+');

Route::get('/author', [AuthorController::class, "index"])->name('author.index');
Route::get('/author/{id}', [AuthorController::class, "show"])->name('author.show')->where('id', '[0-9]+');
Route::post('/author', [AuthorController::class, "store"])->name('author.store');
Route::put('/author/{id}', [AuthorController::class, "update"])->name('author.update')->where('id', '[0-9]+');
Route::delete('/author/{id}', [AuthorController::class, "delete"])->name('author.delete')->where('id', '[0-9]+');

Route::get('/book', [BookController::class, "index"])->name('book.index');
Route::get('/book/{id}', [BookController::class, "show"])->name('book.show')->where('id', '[0-9]+');
Route::post('/book', [BookController::class, "store"])->name('book.store');
Route::put('/book/{id}', [BookController::class, "update"])->name('book.update')->where('id', '[0-9]+');
Route::delete('/book/{id}', [BookController::class, "delete"])->name('book.delete')->where('id', '[0-9]+');

Route::get('/person', [PersonController::class, "index"])->name('person.index');
Route::get('/person/{id}', [PersonController::class, "show"])->name('person.show')->where('id', '[0-9]+');
Route::get('/person/{id}/address', [PersonController::class, "showAddress"])->name('person.showAddress')->where('id', '[0-9]+');
Route::post('/person', [PersonController::class, "store"])->name('person.store');
Route::put('/person/{id}', [PersonController::class, "update"])->name('person.update')->where('id', '[0-9]+');
Route::delete('/person/{id}', [PersonController::class, "delete"])->name('person.delete')->where('id', '[0-9]+');
Route::post('/person/{id}/address', [PersonController::class, "personAddOrUpdateAddress"])->name('personAddOrUpdateAddress')->where('id', '[0-9]+');

Route::get('/address', [AddressController::class, "index"])->name('address.index');
Route::get('/address/{id}', [AddressController::class, "show"])->name('address.show')->where('id', '[0-9]+');
Route::post('/address', [AddressController::class, "store"])->name('address.store');
Route::put('/address/{id}', [AddressController::class, "update"])->name('address.update')->where('id', '[0-9]+');
Route::delete('/address/{id}', [AddressController::class, "delete"])->name('address.delete')->where('id', '[0-9]+');
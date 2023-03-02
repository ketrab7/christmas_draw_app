<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DrawController;

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
    return view('home');
});

Route::get('/group/{id}/relog', [GroupController::class, 'relog'])->whereNumber('id');
Route::resource('group', GroupController::class)->except('show');

Route::resource('user', UserController::class)->except('show');

Route::controller(DrawController::class)->group(function () {
    Route::get('/dashboard', 'index');
    Route::get('/dashboard/{id}/show', 'show')->whereNumber('id');
    Route::get('/draw', 'draw');
    Route::get('/reset', 'reset');
    Route::get('/result/{id?}', 'showResult')->whereNumber('id');
});


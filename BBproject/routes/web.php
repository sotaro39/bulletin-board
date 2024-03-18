<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController; 

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

Route::get('/home', [TopicController::class, 'index'])->middleware('auth')->name('topics.index');
Route::get('/topics/create', [TopicController::class, 'create'])->middleware('auth')->name('topics.create');
Route::post('/topics', [TopicController::class, 'store'])->middleware('auth')->name('topics.store');

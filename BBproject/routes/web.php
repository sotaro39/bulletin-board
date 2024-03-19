<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Models\Comment;
use App\Http\Controllers\DeleteTopicRequirementController; 

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
Route::get('/topics/{topic}', [TopicController::class, 'show'])->middleware('auth')->name('topics.show');
Route::post('/topics/{topic}', [TopicController::class, 'destroy'])->middleware('auth')->name('topics.destroy');
Route::get('/topics/{topic}/deleteRequire', [TopicController::class, 'deleteRequire'])->middleware('auth')->name('topics.deleteRequire'); //変更
Route::post('/deleteTopicRequirements', [DeleteTopicRequirementController::class, 'store'])->middleware('auth')->name('deleteTopicRequirements.store');;//変更



//comment
Route::get('/{topic}/comments/create', [CommentController::class, 'create'])->middleware('auth')->name('comments.create');
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

//logout
Route::get('/', function(){
    Auth::logout();
    return view('welcome');
})->name('logout');

<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Models\Comment;
use App\Http\Controllers\DeleteTopicRequirementController; 
use App\Http\Controllers\DeleteCommentRequirementController;
use App\Http\Controllers\ReplyController;


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

//topic
Route::get('/topics/create', [TopicController::class, 'create'])->middleware('auth')->name('topics.create');
Route::post('/topics', [TopicController::class, 'store'])->middleware('auth')->name('topics.store');
Route::get('/topics/{topic}', [TopicController::class, 'show'])->middleware('auth')->name('topics.show');
Route::post('/topics/{topic}', [TopicController::class, 'destroy'])->middleware('auth')->name('topics.destroy');
Route::get('/topics/{topic}/deleteRequire', [TopicController::class, 'deleteRequire'])->middleware('auth')->name('topics.deleteRequire'); //変更
Route::post('/deleteTopicRequirements', [DeleteTopicRequirementController::class, 'store'])->middleware('auth')->name('deleteTopicRequirements.store');;//変更

//topic delete require
Route::get('/deleteTopicRequirements', [DeleteTopicRequirementController::class, 'index'])->middleware('auth')->name('deleteTopicRequirements.index');
Route::get('/deleteTopicRequirements/{deleteTopicRequirement}', [DeleteTopicRequirementController::class, 'destroy'])->middleware('auth')->name('deleteTopicRequirements.destroy');

//comment
Route::get('/{topic}/comments/create', [CommentController::class, 'create'])->middleware('auth')->name('comments.create');
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::get('/comments/{comment}/deleteRequire', [CommentController::class, 'deleteRequire'])->middleware('auth')->name('comments.deleteRequire');
Route::post('/deleteCommentRequirements', [DeleteCommentRequirementController::class, 'store'])->middleware('auth')->name('deleteCommentRequirements.store');
Route::post('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');

//comment delete require
Route::get('/deleteCommentRequirements', [DeleteCommentRequirementController::class, 'index'])->middleware('auth')->name('deleteCommentRequirements.index');
Route::get('/deleteCommentRequirements/{deleteCommentRequirement}', [DeleteCommentRequirementController::class, 'destroy'])->middleware('auth')->name('deleteCommentRequirements.destroy');

//reply
Route::get('/replies/{comment}', [ReplyController::class, 'index'])->middleware('auth')->name('replies.index');


//logout
Route::get('/', function(){
    Auth::logout();
    return view('welcome');
})->name('logout');

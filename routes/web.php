<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InterestController;



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

Route::get('/home', [UserController::class, 'index'])
    ->name('users.index');

Route::get('/interests', [InterestController::class, 'index'])
    ->name('interests.index');

Route::get('/home/create', [UserController::class, 'create'])
    ->name('users.create');

Route::get('/comment/create/{post}', [CommentController::class, 'create'])
    ->name('comments.create');

Route::get('/home/edit/{post}', [UserController::class, 'edit'])
    ->name('users.edit');

Route::put('/home/update/{post}', [UserController::class, 'update'])
    ->name('users.update');

Route::get('/home/edit/{post}/{comment}', [CommentController::class, 'edit'])
    ->name('comments.edit');

Route::put('/home/update/{post}/{comment}', [CommentController::class, 'update'])
    ->name('comments.update');


Route::post('/home', [UserController::class, 'store'])
    ->name('users.store');



Route::get('/home/{post}', [UserController::class, 'show'])
    ->name('users.show');


#Route::post('/home/{post}', [CommentController::class, 'store'])
#    ->name('comments.store');

Route::get('/profile/{user}', [ProfileController::class, 'show'])
    ->name('profiles.show');

    
Route::delete('/home/{post}/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');

Route::delete('/home/{post}', [UserController::class, 'destroy'])
    ->name('users.destroy');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

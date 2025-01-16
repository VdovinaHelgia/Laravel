<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream

=======
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
>>>>>>> Stashed changes
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
<<<<<<< Updated upstream
});
=======
}); */


Route::get('/', [MainController::class, 'main'])->name('main');

Route::get('/registration', [MainController::class, 'registration'])->name('registration');
Route::post('/registration/check', [MainController::class, 'registration_check'])->middleware('guest');
Route::get('/registration-ok', [MainController::class, 'registrationOk'])->name('registration-ok');

Route::get('/authentication', [MainController::class, 'authentication'])->name('authentication');
Route::post('/authentication/check', [MainController::class, 'authentication_check']);



Route::get('/posts-create', 'App\Http\Controllers\MainController@posts_create')->name('posts-create');

Route::post('/posts-create/check', 'App\Http\Controllers\MainController@posts_create_check');

// Route::get('/account', [AccountController::class, 'index'])->middleware('auth');

Route::get('/account', [AccountController::class, 'index'])->middleware('auth')->name('account.index');

Route::post('/account/update', [AccountController::class, 'update'])->middleware('auth');

Route::post('/upload-avatar', [AccountController::class, 'uploadAvatar'])->middleware('auth');

Route::post('/logout', [AccountController::class, 'logout'])->name('logout');


Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::post('/upload-img', [PostController::class, 'uploadImg'])->middleware('auth');

Route::get('/post_page/{id}', [PostController::class, 'pagePost'])->middleware('auth')->name('post_page');

Route::post('/comment_check', [PostController::class, 'commentCheck'])->name('comment.check');

// Route::get('/posts/my', [PostController::class, 'myPosts'])->name('posts.my');

>>>>>>> Stashed changes

<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Services\Newsletter;
use illuminate\support\facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsLetterController;
use Illuminate\validation\ValidationException;
use App\Http\Controllers\PostCommentController;
use PHPUnit\Framework\Attributes\PostCondition;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', NewsLetterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

//Admin
Route::middleware('can:admin')->group(function() {
Route::get('admin/posts/create', [AdminPostController::class, 'create']);
Route::post('admin/posts', [AdminPostController::class, 'store']);
Route::get('admin/posts', [AdminPostController::class, 'index']);
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
});

<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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



use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', [HomeController::class, 'index'])->name('home');


Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('');

Route::middleware('auth')->group(function () {
    Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
});


Route::middleware('auth', 'isAdmin')->group(function () {
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/news', NewsController::class);
});

Route::prefix('api')->group(function () {
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/{news}', [NewsController::class, 'show']);
});


Route::resource('news', NewsController::class);

Route::middleware('auth')->group(function () {
    Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::get('/', function () {
    return view('client.index');
})->name('home');

Route::get('shop', function () {
    return view('client.shop');
})->name('shop');


Route::get('about', function () {
    return view('client.about');
})->name('about');


// <?php

// use App\Http\Controllers\Admin\CategoryController;
// use App\Http\Controllers\Admin\NewsController;
// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\HomeController;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// Route::get('/', [HomeController::class, 'index'])->name('home');

// // Auth routes
// Auth::routes();

// // Authenticated routes
// Route::middleware('auth')->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
// });

// // Admin routes
// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::resource('admin/categories', CategoryController::class);
//     Route::resource('admin/news', NewsController::class);
// });

// // API routes
// Route::prefix('api')->group(function () {
//     Route::get('/news', [NewsController::class, 'index']);
//     Route::get('/news/{news}', [NewsController::class, 'show']);
// });

// // Client routes
// Route::get('/', function () {
//     return view('client.index');
// })->name('home');

// Route::get('shop', function () {
//     return view('client.shop');
// })->name('shop');

// Route::get('about', function () {
//     return view('client.about');
// })->name('about');

// // Public news routes
// Route::resource('news', NewsController::class);

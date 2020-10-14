<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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
    return view('front/pages/home');
});


// images
// Route::resource('/image', 'ImageController::class');
Route::get('image/create', [ImageController::class, 'create'])->name('image.create');
Route::get('image/index', [ImageController::class, 'index'])->name('image.index');
Route::post('image/store', [ImageController::class, 'store'])->name('image.store');
Route::get('image/{image}/show', [ImageController::class, 'show'])->name('image.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

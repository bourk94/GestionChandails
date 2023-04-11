<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampagnesController;
use App\Http\Controllers\ArticlesController;

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

// Route::get('/', function () {
//     return view('accueil');
// });

Route::get('/',
[CampagnesController::class, 'index'])->name('accueil');
// Route::get('articles',
// [ArticlesController::class, 'index'])->name('articles.index')->middleware('auth');


Route::get('campagnes/create',
[CampagnesController::class, 'create'])->name('campagnes.create');

Route::post('campagnes',
[CampagnesController::class, 'store'])->name('campagnes.store');


Route::get('articles/create',
[ArticlesController::class, 'create'])->name('articles.create');

Route::post('articles',
[ArticlesController::class, 'store'])->name('articles.store');


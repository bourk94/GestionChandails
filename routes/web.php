<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\CampagnesController;
use App\Http\Controllers\ClientsController;

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
    return view('accueil');
});

Route::get('clients/login',
[ClientsController::class, 'showLoginForm'])->name('clients.login')->middleware('guest');

Route::post('login',
[ClientsController::class, 'login'])->name('login')->middleware('guest');

Route::post('logout',
[ClientsController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('clients/register',
[ClientsController::class, 'create'])->name('clients.create')->middleware('guest');

Route::post('clients',
[ClientsController::class, 'store'])->name('clients.store')->middleware('guest');

Route::get('clients',
[ClientsController::class, 'index'])->name('clients.index')->middleware('auth');

Route::get('clients/{id}',
[ClientsController::class, 'show'])->name('clients.show')->middleware('auth');

Route::get('clients/{id}/edit',
[ClientsController::class, 'edit'])->name('clients.edit')->middleware('auth');

Route::patch('clients/{id}',
[ClientsController::class, 'update'])->name('clients.update')->middleware('auth');

Route::delete('clients/{id}/supprimer',
[ClientsController::class, 'destroy'])->name('clients.destroy')->middleware('auth');

Route::get('campagnes/create',
[CampagnesController::class, 'create'])->name('campagnes.create');

Route::post('campagnes',
[CampagnesController::class, 'store'])->name('campagnes.store');
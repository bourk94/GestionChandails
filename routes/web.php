<?php
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampagnesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsagersController;

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


Route::get('/forgot-password', function () {
    return view('clients.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');



Route::get('/',
[CampagnesController::class, 'index'])->name('accueil');

Route::get('clients/login',
[ClientsController::class, 'showLoginForm'])->name('clients.login')->middleware('guest');

// Route::post('login',
// [UsagersController::class, 'login'])->name('login')->middleware('guest');

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


Route::get('articles/create',
[ArticlesController::class, 'create'])->name('articles.create');

Route::post('articles',
[ArticlesController::class, 'store'])->name('articles.store');


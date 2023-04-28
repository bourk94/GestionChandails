<?php
use App\Models\Usager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as validation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampagnesController;
use App\Http\Controllers\UsagersController;
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


Route::get('/forgot-password', function () {
    return view('usagers.forgot-password');
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
    return view('usagers.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => ['required','confirmed', 'max:64', validation::min(8)->letters()->mixedCase()->numbers()->symbols()]
    ]);

   
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (Usager $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('usagers.login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');



Route::get('/',
[CampagnesController::class, 'index'])->name('accueil');

Route::post('login',
[UsagersController::class, 'login'])->name('login')->middleware('guest');

Route::post('logout',
[UsagersController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('admin',
[UsagersController::class, 'storeAdmin'])->name('usagers.storeAdmin')->middleware('auth');

Route::get('admin/register',
[UsagersController::class, 'createAdmin'])->name('admin.create')->middleware('auth');

Route::patch('admin/update',
[UsagersController::class, 'updateAdmin'])->name('admin.update')->middleware('auth');

Route::post('usagers',
[UsagersController::class, 'store'])->name('usagers.store')->middleware('guest');

// Route::get('usagers',
// [UsagersController::class, 'index'])->name('usagers.index')->middleware('auth');

Route::get('usagers/login',
[UsagersController::class, 'showLoginForm'])->name('usagers.login')->middleware('guest');

Route::get('usagers/register',
[UsagersController::class, 'create'])->name('usagers.create')->middleware('guest');

Route::get('usagers/edit',
[UsagersController::class, 'edit'])->name('usagers.edit')->middleware('auth');

Route::patch('usagers/update',
[UsagersController::class, 'update'])->name('usagers.update')->middleware('auth');

// Route::get('usagers/{id}',
// [UsagersController::class, 'show'])->name('usagers.show')->where('id', '[0-9]+')->middleware('auth');

// Route::post('usagers/{id}/edit',
// [UsagersController::class, 'edit'])->name('usagers.edit')->where('id', '[0-9]+')->middleware('auth');

Route::delete('usagers/{id}/supprimer',
[UsagersController::class, 'destroy'])->name('usagers.destroy')->where('id', '[0-9]+')->middleware('auth');

Route::post('campagnes',
[CampagnesController::class, 'store'])->name('campagnes.store');

Route::get('campagnes/create',
[CampagnesController::class, 'create'])->name('campagnes.create');

//Mettre les middleware ???
Route::post('articles',
[ArticlesController::class, 'store'])->name('articles.store'); //->middleware('auth');

Route::get('articles/create',
[ArticlesController::class, 'create'])->name('articles.create'); //->middleware('auth');

Route::delete('/articles/{id}',
[ArticlesController::class, 'destroy'])->where('id', '[0-9]+')->name('articles.destroy'); //->middleware('auth');

Route::get('/articles/{id}/modifier/',
[ArticlesController::class, 'edit'])->where('id', '[0-9]+')->name('articles.edit'); //->middleware('auth');

Route::patch('/articles/{id}/modifier/',
[ArticlesController::class, 'update'])->where('id', '[0-9]+')->name('articles.update'); //->middleware('auth');





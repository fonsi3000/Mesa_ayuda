<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Livewire\Users;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\pages\HomePage;

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Ruta para manejar el inicio de sesión
Route::post('/', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Verifica los roles utilizando Spatie Laravel Permission
        if ($user->hasRole('admin') || $user->hasRole('agent')) {
            return redirect('pages-home');
        } elseif ($user->hasRole('user')) {
            return redirect('dashboard');
        }
    }

    return redirect('/')->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
})->name('post.login');

// Ruta para manejar el cierre de sesión
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Rutas para los dashboards
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/pages-home', [HomePage::class, 'index'])
    ->middleware(['can:pages-home'])
    ->name('pages-home');


    Route::get('/dashboard', function () {
        return view('content.pages.dashboard');
    })->middleware(['can:dashboard'])->name('dashboard');


    Route::resource('users', UsersController::class)->names('users');
    Route::resource('categories', CategoriesController::class)->names('categories');
    Route::resource('tickets', TicketsController::class)->names('tickets');
});

<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Livewire\Users;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserDashboarController;

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
            // Redirige a tickets.index cuando sea admin o agent
            return redirect()->route('tickets.index');
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


    Route::get('/dashboard', function () {

        return view('content.pages.dashboard');
    })->name('dashboard')->middleware('can:dashboard');
    


    Route::resource('users', UsersController::class)->names('users');
    Route::resource('categories', CategoriesController::class)->names('categories');
    // Las otras rutas del recurso ticket se mantienen sin cambios
    Route::resource('tickets', TicketsController::class)->except(['index'])->names('tickets');

    Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets.index')->middleware('can:tickets.index');
    // La ruta tickets.index con el middleware de autorización
    
    Route::get('/mis.tickets', [TicketsController::class, 'index2'])->name('mis.tickets');

    Route::get('/ticket_asignado', [TicketsController::class, 'ticket_asignado'])->name('ticket_asignado');

    Route::get('/ticket_resueltos', [TicketsController::class, 'ticket_resueltos'])->name('ticket_resueltos');

    

});

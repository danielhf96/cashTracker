<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Rutas para registro */
Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('register.store');

/* Rutas para verificación de cuenta */

// Auth: Es para proteger la ruta, debe estar logueado.
// Signed: Es para proteger la ruta, debe tener una firma válida en la URL.
Route::get('/email/verification/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard')->with('success', '¡Tu cuenta ha sido verificada exitosamente!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('email/verification', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('email/verification-notification', function (Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', '¡Correo de verificación reenviado!');
})->middleware(['auth', 'throttle:1,1'])->name('verification.send');

/* Rutas para login */
Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/auth/logout', [LogoutController::class, 'store'])->name('logout.store');

/* Dashboard */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
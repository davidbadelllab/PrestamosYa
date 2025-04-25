<?php

use App\Livewire\UserForm;
use App\Livewire\DeudorForm;
use App\Livewire\AvalForm;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\CapitalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Inspiring;

// Ruta pública para la página de inicio
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Grupo de rutas protegidas para autenticación y verificación de usuarios
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas sin prefijos de carpetas
    Route::get('users', UserForm::class)->name('users.index');
    Route::get('deudores', DeudorForm::class)->name('deudor.index');
    Route::get('avales', AvalForm::class)->name('avales.index');
    Route::get('prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
    Route::get('capital', [CapitalController::class, 'index'])->name('capital.index');
    
    // Rutas para capital
    Route::post('capital/aumentar', [CapitalController::class, 'update'])->name('capital.update');
    Route::post('capital/ganancias', [CapitalController::class, 'calcularGananciasTotales'])->name('capital.ganancias');

    // Rutas para pagos
    Route::resource('pagos', PagoController::class);
});

// Rutas para el perfil
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Comando para mostrar una frase inspiradora desde Artisan
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

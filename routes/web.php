<?php

use App\Http\Controllers\PesoSecoController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\LoginController; // Importar el LoginController
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Models\PesoSeco;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Ruta de inicio (página principal)
Route::get('/index', [DashboardController::class, 'showChart']);


// Rutas de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Mostrar el formulario de login
Route::post('/login', [LoginController::class, 'login']); // Procesar la autenticación
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Cerrar sesión

// Rutas de recurso para PesoSeco (CRUD completo)
Route::middleware('auth')->resource('pesos', PesoSecoController::class);

// Ruta para mostrar el gráfico de evolución del peso seco (Dashboard)
//Route::middleware('auth')->get('/index', [PesoSecoController::class, 'showChart'])->name('index');

// Rutas para el formulario adicional
Route::middleware('auth')->get('/form', [FormController::class, 'showForm']); // Mostrar el formulario
Route::middleware('auth')->post('/form-submit', [FormController::class, 'submitForm'])->name('form.submit'); // Enviar el formulario

// Ruta para mostrar el formulario de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro
Route::post('/register', [RegisterController::class, 'register']);

// Ruta protegida de inicio para los usuarios autenticados
Route::middleware('auth')->get('/home', function () {
    return '¡Bienvenido a la aplicación!'; // Ruta de bienvenida
})->name('home');


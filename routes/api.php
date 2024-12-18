<?php
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/peso-seco', [DashboardController::class, 'getPesoSecoData']);

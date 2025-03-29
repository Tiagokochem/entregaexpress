<?php

use App\Http\Middleware\EnsureUserIsCompany;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// 🔒 Rotas protegidas por autenticação e verificação de email
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard geral (padrão do Jetstream)
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Dashboard da empresa (com middleware personalizado)
    Route::middleware(EnsureUserIsCompany::class)->group(function () {
        Route::get('/company/dashboard', fn () => Inertia::render('Company/Dashboard'))
            ->name('company.dashboard');
    });
});

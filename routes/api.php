<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Middleware\EnsureUserIsCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas para usuários autenticados
Route::middleware('auth:sanctum')->group(function () {
    
    // Rotas públicas para qualquer usuário logado (empresa ou entregador)
    Route::resource('deliveries', DeliveryController::class)->except(['create', 'edit']);
    
    // Apenas para empresas
    Route::middleware(EnsureUserIsCompany::class)->group(function () {
        Route::get('/company/dashboard-data', function (Request $request) {
            // Aqui você retorna dados em JSON, ex: deliveries da empresa
            return [
                'deliveries' => $request->user()->deliveries()->latest()->get(),
            ];
        });
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplianceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [ComplianceController::class, 'index'])->middleware('auth');
Route::get('/compliance/create', [ComplianceController::class, 'create'])->middleware('auth');
Route::post('/compliance', [ComplianceController::class, 'store'])->middleware('auth');
Route::get('/compliance/edit/{id}', [ComplianceController::class, 'edit'])->middleware('auth');
Route::put('/compliance/update/{id}', [ComplianceController::class, 'update'])->middleware('auth');
Route::get('/compliance/show/{id}', [ComplianceController::class, 'show'])->name('compliance.show')->middleware('auth');



// Definir o middleware 'auth' para todas as rotas dentro do grupo
Route::middleware(['auth'])->group(function () {
    // Usuários
    Route::middleware(['checkRole'])->prefix('users')->group(function () {
        Route::get('/listagem', [UserController::class, 'list']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::put('/update/{id}', [UserController::class, 'update']);
    });

    //Clientes
    Route::middleware(['checkSoc'])->prefix('clients')->group(function () {
        Route::get('/listagem', [ClientController::class, 'list']);
        Route::get('/create', [ClientController::class, 'create']);
        Route::post('/', [ClientController::class, 'store']);
        Route::get('/edit/{id}', [ClientController::class, 'edit']);
        Route::put('/update/{id}', [ClientController::class, 'update']);
    });
    // Classificações
    Route::middleware(['checkRole'])->prefix('classifications')->group(function () {
        Route::get('/listagem', [ClassificationController::class, 'list']);
        Route::get('/create', [ClassificationController::class, 'create']);
        Route::post('/', [ClassificationController::class, 'store']);
        Route::get('/edit/{id}', [ClassificationController::class, 'edit']);
        Route::put('/update/{id}', [ClassificationController::class, 'update']);
    });

    // Departamentos
    Route::middleware(['checkRole'])->prefix('departaments')->group(function () {
        Route::get('/listagem', [DepartamentController::class, 'list']);
        Route::get('/create', [DepartamentController::class, 'create']);
        Route::post('/', [DepartamentController::class, 'store']);
        Route::get('/edit/{id}', [DepartamentController::class, 'edit']);
        Route::put('/update/{id}', [DepartamentController::class, 'update']);
    });

    Route::put('/message', [MessageController::class, 'create']);
});

// Mensagem


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [ComplianceController::class, 'index'])->name('dashboard');
});

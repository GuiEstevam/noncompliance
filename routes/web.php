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

//Usuários
Route::get('/users/listagem', [UserController::class, 'list'])->middleware(['auth', 'checkRole']);
Route::get('/users/create', [UserController::class, 'create'])->middleware(['auth', 'checkRole']);
Route::post('/users', [UserController::class, 'store'])->middleware(['auth', 'checkRole']);
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->middleware(['auth', 'checkRole']);
Route::put('/users/update/{id}', [UserController::class, 'update'])->middleware(['auth', 'checkRole']);

//Clientes
Route::get('/clients/listagem', [ClientController::class, 'list'])->middleware(['auth', 'checkRole']);
Route::get('/clients/create', [ClientController::class, 'create'])->middleware(['auth', 'checkRole']);
Route::post('/clients', [ClientController::class, 'store'])->middleware(['auth', 'checkRole']);
Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->middleware(['auth', 'checkRole']);
Route::put('/clients/update/{id}', [ClientController::class, 'update'])->middleware(['auth', 'checkRole']);

//Classificações
Route::get('/classifications/listagem', [ClassificationController::class, 'list'])->middleware(['auth', 'checkRole']);
Route::get('/classifications/create', [ClassificationController::class, 'create'])->middleware(['auth', 'checkRole']);
Route::post('/classifications', [ClassificationController::class, 'store'])->middleware(['auth', 'checkRole']);
Route::get('/classifications/edit/{id}', [ClassificationController::class, 'edit'])->middleware(['auth', 'checkRole']);
Route::put('/classifications/update/{id}', [ClassificationController::class, 'update'])->middleware(['auth', 'checkRole']);

//Classificações
Route::get('/departaments/listagem', [DepartamentController::class, 'list'])->middleware(['auth', 'checkRole']);
Route::get('/departaments/create', [DepartamentController::class, 'create'])->middleware(['auth', 'checkRole']);
Route::post('/departaments', [DepartamentController::class, 'store'])->middleware(['auth', 'checkRole']);
Route::get('/departaments/edit/{id}', [DepartamentController::class, 'edit'])->middleware(['auth', 'checkRole']);
Route::put('/departaments/update/{id}', [DepartamentController::class, 'update'])->middleware(['auth', 'checkRole']);

// Mensagem

Route::put('/message', [MessageController::class, 'create'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [ComplianceController::class, 'index'])->name('dashboard');
});

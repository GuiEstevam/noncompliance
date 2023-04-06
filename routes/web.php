<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplianceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClassificationController;

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

Route::get('/', [ComplianceController::class, 'index']);
Route::get('/compliance/create', [ComplianceController::class, 'create']);
Route::post('/compliance', [ComplianceController::class, 'store']);
Route::get('/compliance/edit/{id}', [ComplianceController::class, 'edit']);
Route::put('/compliance/update/{id}', [ComplianceController::class, 'update']);
Route::get('/compliance/show/{id}', [ComplianceController::class, 'show']);

//Usuários
Route::get('/users/listagem', [UserController::class, 'list'])->middleware('CheckRole');
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::put('/users/update/{id}', [UserController::class, 'update']);
//Clientes
Route::get('/clients/listagem', [ClientController::class, 'list']);
Route::get('/clients/create', [ClientController::class, 'create']);
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients/edit/{id}', [ClientController::class, 'edit']);
Route::put('/clients/update/{id}', [ClientController::class, 'update']);
//Classificações
Route::get('/classifications/listagem', [ClassificationController::class, 'list']);
Route::get('/classifications/create', [ClassificationController::class, 'create']);
Route::post('/classifications', [ClassificationController::class, 'store']);
Route::get('/classifications/edit/{id}', [ClassificationController::class, 'edit']);
Route::put('/classifications/update/{id}', [ClassificationController::class, 'update']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

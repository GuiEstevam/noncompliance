<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplianceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Models\Compliance;

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

//Usuários
Route::get('/users/listagem', [UserController::class, 'list']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'edit']);
//Clientes
Route::get('/clients/listagem', [ClientController::class, 'list']);
Route::get('/clients/create', [ClientController::class, 'create']);
Route::post('/clients', [ClientController::class, 'store']);
//Categorias
Route::get('/categories/listagem', [CategoryController::class, 'list']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

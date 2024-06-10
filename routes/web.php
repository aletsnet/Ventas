<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {return view('welcome');});

Auth::routes();
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/p/contratos', [App\Http\Controllers\ContratosController::class, 'page'])->name('contratos.page');
    
    Route::resource('contratos', 'App\Http\Controllers\ContratosController');
}
);
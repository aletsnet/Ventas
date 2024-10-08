<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;

Route::post('/register', [RegisterController::class, 'register'])->name('register');

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

Auth::routes(['verify' => true]);
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
    
    Route::get('/p/tiendas', [App\Http\Controllers\TiendasController::class, 'page'])->name('shops.page');
    Route::get('/p/contratos', [App\Http\Controllers\ContratosController::class, 'page'])->name('contratos.page');
    Route::get('/p/user', [App\Http\Controllers\UserController::class, 'page'])->name('user.page');
    

    Route::post('/lists', [App\Http\Controllers\GeneralController::class, 'lists'])->name('lists');
    Route::get('/shops/user/{tienda}', [App\Http\Controllers\TiendasController::class, 'list_users'])->name('shops.users');
    Route::post('/shops/users/{tienda}', [App\Http\Controllers\TiendasController::class, 'update_users'])->name('shops.update.users');
    Route::post('/upfile/logos', [App\Http\Controllers\GeneralController::class, 'logos'])->name('file.logo');

    //Route::get('/email/v/{token}', [App\Http\Controllers\MailsController::class, 'mail_valido'])->name('validate.email'); 
    Route::post('/email/reenvio', [App\Http\Controllers\MailsController::class, 'mail_reenvio'])->name('reenvio.email'); 
    
    Route::resource('shops', 'App\Http\Controllers\TiendasController');
    Route::resource('contratos', 'App\Http\Controllers\ContratosController');
    Route::resource('user', 'App\Http\Controllers\UserController');
}
);
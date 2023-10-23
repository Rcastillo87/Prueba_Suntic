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
/*Route::get('/', function () {
    return view('users');
});*/



use App\Http\Controllers\Usuario_Controller;
Route::get('/', [Usuario_Controller::class, 'Lista'])->name('welcome');
Route::post('/usuario/input', [Usuario_Controller::class, 'Input'])->name('usuario.input');

use App\Http\Controllers\Contrato_Controller;
Route::get('/contrato', [Contrato_Controller::class, 'Lista'])->name('contrato');
Route::post('/contrato/input', [Contrato_Controller::class, 'Input'])->name('contrato.input');


/*
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
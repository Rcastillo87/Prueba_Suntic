<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

use App\Http\Controllers\Informacion_Controller;
Route::get('informacion/lista',[Informacion_Controller::class, 'Lista']);
Route::get('informacion/excel',[Informacion_Controller::class, 'Excel'])->name('informacion.excel');
Route::get('informacion/pdf',[Informacion_Controller::class, 'PDF'])->name('informacion.pdf');
Route::post('informacion/input',[Informacion_Controller::class, 'Input'])->name('informacion.input');
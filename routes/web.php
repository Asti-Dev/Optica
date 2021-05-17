<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')
->name('home');

Route::view('/control', 'controles.control')->middleware('auth')->name('control');

Route::post('/productos/searchForm', [ProductoController::class, 'searchForm'])->name('productos.searchF');

Route::post('/productos/search', [ProductoController::class, 'searchFormRange'])->name('productos.searchFR');

Route::get('/productos/search/{stype}/{keyword}/{mostrarAcabados}', [ProductoController::class, 'search'])->name('productos.search');

Route::get('/productos/search/{rtype}/{inicio}/{fin}/{mostrarAcabados}', [ProductoController::class, 'searchRangos'])->name('productos.searchRangos');

Route::get('/productos/excel', [ProductoController::class, 'excelAll'])->name('productos.excelAll');

Route::get('/productos/barcode', [ProductoController::class, 'barcode'])->name('productos.barcode');

Route::get('/productos/barcodeOne/{producto}', [ProductoController::class, 'barcodeOne'])->name('productos.barcodeOne');

Route::post('/guias/searchForm', [GuiaController::class, 'searchForm'])->name('guias.searchF');

Route::post('/guias/search', [GuiaController::class, 'searchFormRange'])->name('guias.searchFR');

Route::get('/guias/search/{stype}/{keyword}', [GuiaController::class, 'search'])->name('guias.search');

Route::get('/guias/search/{rtype}/{inicio}/{fin}', [GuiaController::class, 'searchRangos'])->name('guias.searchRangos');

Route::get('/guias/excel', [GuiaController::class, 'excelAll'])->name('guias.excelAll');

Route::put('/guias/anular/{idguias}', [GuiaController::class, 'anular'])->name('guias.anular');

Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');

Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');

Route::resource('productos',ProductoController::class);

Route::resource('guias', GuiaController::class);

Route::resource('clientes', ClienteController::class);

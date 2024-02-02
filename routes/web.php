<?php

use App\Http\Controllers\ApprenantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ApprenantController::class, 'index']);

Route::get('/hello/{prenom?}',[ApprenantController::class,'hello'])->name('hello');

Route::post('/hello/{prenom}',[ApprenantController::class,'hello']);

Route::post('/add',[ApprenantController::class,'add'])->name('add');

Route::get('/getOne/{id}',[ApprenantController::class,'getOne'])->name('getOne');

Route::put('/update/{id}', [ApprenantController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [ApprenantController::class, 'delete'])->name('delete');

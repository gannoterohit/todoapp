<?php

use App\Http\Controllers\todoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[todoController::class,'index'])->name('/');
// Route::get('create',[todoController::class,'create'])->name('create');
// Route::post('store',[todoController::class,'store'])->name('store');
// Route::get('/delete/{id}',[todoController::class,'delete'])->name('delete');
// Route::get('/edit/{id}',[todoController::class,'edit'])->name('edit');
// Route::post('/update',[todoController::class,'update'])->name('update');
// Route::get('/show/{id}',[todoController::class,'show'])->name('show');

Route::resource('todo', todoController::class);
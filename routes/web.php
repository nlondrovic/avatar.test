<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/saved', [HomeController::class, 'saved'])->name('saved');
Route::get('/discarded', [HomeController::class, 'discarded'])->name('discarded');


Route::post('/discardImage', [HomeController::class, 'discardImage'])->name('discardImage');
Route::post('/saveImage', [HomeController::class, 'saveImage'])->name('saveImage');

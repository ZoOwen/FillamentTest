<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
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

// Route::get('/home', function () {
//     return view('Home.index');
// })->middleware(['auth', 'verified'])->name('home');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [ProductController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::post('/store-transaction', [ProductController::class, 'storeTransaction'])
->middleware(['auth', 'verified'])
->name('store.transaction');

//Laporan
Route::get('/report', [ReportController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('report');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

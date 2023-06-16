<?php

use App\Http\Controllers\TransactionController;
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

Route::get('/transaction', function () {
    return view('index');
});

Route::post('/transaction', [TransactionController::class, 'handleTransaction'])->name('store-transaction');

Route::get('/transaction/{transaction}', [TransactionController::class, 'showTransaction'])->name('show-transaction');

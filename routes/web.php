<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/details/{slug}', 'frontend.details')->name('detail');
Route::view('/checkout', 'frontend.checkout')->name('checkout');
Route::view('/checkout-success', 'frontend.checkout-success')->name('checkout-success');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('events/{event}/scan', [AdminEventController::class, 'scan'])->name('events.scan');
        Route::resource('events', AdminEventController::class);
        Route::resource('events.tickets', AdminTicketController::class);
        Route::get('pdf/{event}/{transaction}', [AdminTransactionController::class, 'pdf'])->name('pdf');
        Route::get('approve/{event}/{transaction}', [AdminTransactionController::class, 'approve'])->name('approve');
        Route::resource('events.transactions', AdminTransactionController::class);
    });
});

<?php

use App\Http\Controllers\Subscription\SubscriptioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::get('/subscriptions/resume', [SubscriptioController::class, 'resume'])->name('subscriptions.resume');
Route::get('/subscriptions/cancel', [SubscriptioController::class, 'cancel'])->name('subscriptions.cancel');
Route::get('/subscriptions/invoice/{invoice}', [SubscriptioController::class, 'downloadInvoice'])->name('subscriptions.invoice.download');
Route::get('/subscriptions/account', [SubscriptioController::class, 'account'])->name('subscriptions.account');
Route::post('/subscriptions/store', [SubscriptioController::class, 'store'])->name('subscriptions.store');
Route::get('/subscriptions/checkout', [SubscriptioController::class, 'index'])->name('subscriptions.checkout');
Route::get('/subscriptions/premium', [SubscriptioController::class, 'premium'])->name('subscriptions.premium')->middleware(['subscribed']);;

Route::get('/',[SiteController::class,  'index'])->name('site.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

<?php

use App\Livewire\CategoryPage;
use App\Livewire\DashboardPage;
use App\Livewire\LoginPage;
use App\Livewire\OderPage;
use App\Livewire\ProductPage;
use App\Livewire\SalePage;
use App\Livewire\ShippingPage;
use App\Livewire\UserPage;
use Illuminate\Support\Facades\Auth;
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
// logout route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
Route::get('/login', LoginPage::class)->name('login');

// Auth routes
Route::group(['middleware' => 'auth:web'], function () {
    // User routes
    Route::get('/', DashboardPage::class)->name('dashboard');
    Route::get('/users', UserPage::class)->name('users');
    Route::get('/categories', CategoryPage::class)->name('categories');
    Route::get('/products', ProductPage::class)->name('products');
    Route::get('/orders', OderPage::class)->name('orders');
    Route::get('/shipping', ShippingPage::class)->name('shipping');
    Route::get('/sales', SalePage::class)->name('sales');
});
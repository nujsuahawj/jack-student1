<?php

use App\Livewire\CategoryPage;
use App\Livewire\DashboardPage;
use App\Livewire\LoginPage;
use App\Livewire\OderPage;
use App\Livewire\OrderCreatePage;
use App\Livewire\OrderEditePage;
use App\Livewire\OrderViewPage;
use App\Livewire\ProductCreatePage;
use App\Livewire\ProductEditePage;
use App\Livewire\ProductPage;
use App\Livewire\SalePage;
use App\Livewire\UserCreatePage;
use App\Livewire\UserEditePage;
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
    Route::get('/users/create', UserCreatePage::class)->name('users-create');
    Route::get('/users/edite/{id}', UserEditePage::class)->name('users-edite');
    Route::get('/categories', CategoryPage::class)->name('categories');
    Route::get('/products', ProductPage::class)->name('products');
    Route::get('/products/create', ProductCreatePage::class)->name('products-create');
    Route::get('/products/edite/{id}', ProductEditePage::class)->name('products-edite');
    Route::get('/orders', OderPage::class)->name('orders');
    Route::get('/orders/create', OrderCreatePage::class)->name('orders-create');
    Route::get('/orders/edite/{id}', OrderEditePage::class)->name('orders-edite');
    Route::get('/orders/view/{id}', OrderViewPage::class)->name('orders-view');
    Route::get('/sales', SalePage::class)->name('sales');
});
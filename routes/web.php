<?php

use App\Http\Controllers\Controller;
use App\Livewire\CategoryPage;
use App\Livewire\CustomerCreatePage;
use App\Livewire\CustomerEditePage;
use App\Livewire\CustomerPage;
use App\Livewire\DashboardPage;
use App\Livewire\LoginPage;
use App\Livewire\OderPage;
use App\Livewire\OrderCreatePage;
use App\Livewire\OrderEditePage;
use App\Livewire\OrderViewPage;
use App\Livewire\ProductCreatePage;
use App\Livewire\ProductEditePage;
use App\Livewire\ProductPage;
use App\Livewire\ReportPage;
use App\Livewire\SalePage;
use App\Livewire\SupplierCreate;
use App\Livewire\SupplierEdite;
use App\Livewire\SupplierPage;
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
    Route::get('/customers', CustomerPage::class)->name('customers');
    Route::get('/customers/create', CustomerCreatePage::class)->name('customers-create');
    Route::get('/customers/edite/{id}', CustomerEditePage::class)->name('customers-edite');
    Route::get('/suppliers', SupplierPage::class)->name('suppliers');
    Route::get('/suppliers/create', SupplierCreate::class)->name('suppliers-create');
    Route::get('/suppliers/edite/{id}', SupplierEdite::class)->name('suppliers-edite');
    Route::get('/categories', CategoryPage::class)->name('categories');
    Route::get('/products', ProductPage::class)->name('products');
    Route::get('/products/create', ProductCreatePage::class)->name('products-create');
    Route::get('/products/edite/{id}', ProductEditePage::class)->name('products-edite');
    Route::get('/orders', OderPage::class)->name('orders');
    Route::get('/orders/create', OrderCreatePage::class)->name('orders-create');
    Route::get('/orders/edite/{id}', OrderEditePage::class)->name('orders-edite');
    Route::get('/orders/view/{id}', OrderViewPage::class)->name('orders-view');
    Route::get('/sales', SalePage::class)->name('sales');
    Route::get('/reports', ReportPage::class)->name('reports');

    // route for api call
    Route::get('/bill-sale/{id}', [Controller::class, 'data'])->name('bill-sale');
});
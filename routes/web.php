<?php

use App\Livewire\DashboardPage;
use App\Livewire\LoginPage;
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

Route::get('/login', LoginPage::class)->name('login');

// Auth routes
Route::group(['middleware' => 'auth:web'], function () {
    // User routes
    Route::get('/', DashboardPage::class)->name('dashboard');
});
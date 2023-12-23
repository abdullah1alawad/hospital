<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    $hash = \Illuminate\Support\Facades\Hash::make('abd12345');
    return $hash;
});

Route::get()

Route::get('/Dashboard-Admin', [DashboardController::class, 'index']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

        //---------------------------user dashboard---------------------------
    Route::get('/dashboard/user', function () {
        return view('Dashboard.User.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard.user');

        //---------------------------end user dashboard------------------------

        //---------------------------admin dashboard-----------------------------

    Route::get('/dashboard/admin', function () {
        return view('Dashboard.Admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

        //---------------------------end admin dashboard-----------------------

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';

});




<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TesController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail', [DetailController::class, 'index'])->name('detail');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/success', [CheckoutController::class, 'success'])->name('success');


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Travel Package Controller
        Route::get('/travel-package', [TravelPackageController::class,'index'])->name('travel-package.index');
        Route::get('/travel-package/create', [TravelPackageController::class,'create'])->name('travel-package.create');
        Route::post('/travel-package/create', [TravelPackageController::class,'store'])->name('travel-package.store');
        Route::get('/travel-package/edit/{id}',[TravelPackageController::class, 'edit'])->name('travel-package.edit');
        Route::post('/travel-package/update/{id}',[TravelPackageController::class, 'update'])->name('travel-package.update');
        Route::delete('/travel-package/delete/{id}',[TravelPackageController::class, 'delete'])->name('travel-package.delete');

        // Galler Controller 
        Route::get('/travel-image', [GalleryController::class,'index'])->name('travel-gallery.index');
        Route::get('/travel-image/create', [GalleryController::class,'create'])->name('travel-gallery.create');
        Route::post('/travel-image/create', [GalleryController::class,'store'])->name('travel-gallery.store');
        Route::get('/travel-image/edit/{id}', [GalleryController::class,'edit'])->name('travel-gallery.edit');
        Route::put('/travel-image/edit/{id}', [GalleryController::class,'update'])->name('travel-gallery.update');
        Route::delete('travel-image/delete/{id}', [GalleryController::class,'delete'])->name('travel-gallery.delete');

    });


Auth::routes(['verify' => true]);


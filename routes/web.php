<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/fr');

Route::prefix('{locale}')
    ->whereIn('locale', config('app.available_locales', ['fr', 'en']))
    ->middleware('setlocale')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::get('/tentes', [TentController::class, 'index'])->name('tentes.index');
        Route::get('/tentes/{tent}', [TentController::class, 'show'])->name('tentes.show');

        Route::get('/reservation/{tent?}', [BookingController::class, 'create'])->name('reservation.create');
        Route::post('/reservation', [BookingController::class, 'store'])->name('reservation.store');
        Route::get('/reservation-confirmee/{reference}', [BookingController::class, 'confirmation'])->name('reservation.confirmation');

        Route::get('/a-propos', [PageController::class, 'about'])->name('pages.about');
        Route::get('/preparer-mon-sejour', [PageController::class, 'prepareStay'])->name('pages.prepare-stay');
        Route::get('/politique-de-confidentialite', [PageController::class, 'privacy'])->name('pages.privacy');
        Route::get('/politique-de-cookies', [PageController::class, 'cookies'])->name('pages.cookies');
        Route::get('/conditions-generales-de-vente', [PageController::class, 'terms'])->name('pages.terms');
    });

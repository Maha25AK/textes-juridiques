<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\TexteJuridiqueController;

// Controllers visiteurs
use App\Http\Controllers\Visitor\DomaineController;

// Controllers admin
use App\Http\Controllers\Admin\TexteJuridiqueController as AdminTexteController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DomaineController as AdminDomaineController;

Route::get('/', [AccueilController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['fr', 'ar'])) {
        session(['locale' => $locale]);
    }

    return back();
})->name('lang.switch');


// =======================
// Routes visiteurs
// =======================

Route::get('/categorie/{id}', [DomaineController::class, 'index'])
    ->name('categorie.show');

Route::get('/categorie/{id}', [DomaineController::class, 'index'])
    ->name('categorie.show');

Route::get('/domaine/{id}', [TexteJuridiqueController::class, 'index'])
    ->name('domaine.show');

Route::get('/texte/{id}', [TexteJuridiqueController::class, 'show'])
    ->name('texte.show');


// =======================
// Routes protégées (Admin)
// =======================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('gestionnaire/textes', AdminTexteController::class);

    Route::resource('gestionnaire/categories', CategorieController::class);

    Route::resource('gestionnaire/domaines', AdminDomaineController::class)
        ->names('domaines');
});

require __DIR__.'/auth.php';
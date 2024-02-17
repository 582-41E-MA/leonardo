<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\StripeController;

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


// Route pour afficher tous les produits
Route::get('/', [ProduitController::class, 'index']);


// Route pour afficher un produit spécifique
Route::get('/produit/{id}', [ProduitController::class, 'show']);
Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('produit.show');

// Routes pour stripe checkout
Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/success', [StripeController::class, 'success'])->name('success');
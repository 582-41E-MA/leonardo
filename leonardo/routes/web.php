<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CartController;

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
Route::get('/success', [StripeController::class, 'success'])->name('checkout.success');

// Routes pour le panier
// Afficher le panier
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Ajouter un produit au panier
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Supprimer un produit du panier
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Mettre à jour la quantité d'un produit dans le panier
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

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


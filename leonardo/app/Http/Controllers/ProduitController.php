<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Produit;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        // Récupère tous les produits
        $produits = Produit::all();
    
        // Passe les produits à la vue
        return view('home', ['produits' => $produits]);
    }
    

    public function show($id)
    {
        // Récupère le produit par son id
        $produit = Produit::findOrFail($id);
    
        // Passe le produit à la vue
        return view('robot-show', ['produit' => $produit]);
    }
    
}

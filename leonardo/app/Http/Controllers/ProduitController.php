<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Produit;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all(); // Remplace 'Produit' par le nom de ton modèle
        return view('home', compact('produits'));
    }
    
    

    public function show($id)
    {
        // Récupère le produit par son id
        $produit = Produit::findOrFail($id);
        
    
        // Passe le produit à la vue
        return view('show', ['produit' => $produit]);
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class CartController extends Controller
{
    // Ajouter un produit au panier
    public function add(Request $request, $id) {

        $produit = Produit::findOrFail($id);

        $cart = session()->get('cart', []);
    
       
        $cart[$id] = [
            "id" => $id, 
            "nom" => $produit->nom_produit,
            "quantite" => isset($cart[$id]) ? $cart[$id]['quantite'] + 1 : 1,
            "prix" => $produit->prix,
            "image_path" => $produit->image_path
        ];
    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès!');
    }
    
    

    // Supprimer un produit du panier
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produit retiré du panier avec succès.');
    }

    // Afficher le panier
    public function index()
    {
        return view('cart');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class CartController extends Controller
{

      /**
       * Afficher le panier 
       */
      public function index() {
          return view('cart');
      }

    /**
     * Ajouter un produit au panier
     */
    public function add(Request $request, $id) {
        $produit = Produit::findOrFail($id);
        $cart = session()->get('cart', []);
    
        // récupérer la quantité choisie par le user, sinon 1 
        $quantiteUser = $request->input('quantite', 1);
    
        if(isset($cart[$id])) {
            //si le produit est déjà dans la panier, rajouter la quantité choisie par le user
            $cart[$id]['quantite'] += $quantiteUser;
        } else {
            // si le produit n'est pas dans le panier, utilise la quantité chosie par le user
            $cart[$id] = [
                "id" => $id, 
                "nom" => $produit->nom_produit,
                "quantite" => $quantiteUser,
                "prix" => $produit->prix,
                "image_path" => $produit->image_path
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès!');
    }
    

    /**
     * Mettre à jour la quantité d'un produit dans le panier
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantite'] = $request->quantite;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Quantité mise à jour avec succès.');
    }

    /**
     * Supprimer le produit du panier (total)
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produit retiré du panier avec succès.');
    }

  
}

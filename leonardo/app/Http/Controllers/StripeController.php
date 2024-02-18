<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\DetailsCommande;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller {
    public function checkout(Request $request) {

        Stripe::setApiKey(env('STRIPE_SECRET'));

          
        $cartItems = session('cart', []);
        $line_items = [];
        foreach ($cartItems as $id => $details) {
            $produit = Produit::find($id); // Utilise $id directement ici
            if (!$produit) {
                continue; // Skip si le produit n'est pas trouvé
            }
        
            $line_items[] = [
                'price_data' => [
                    'currency' => 'cad',
                    'product_data' => [
                        'name' => $produit->nom_produit,
                    ],
                    'unit_amount' => $produit->prix * 100, // Convertir en cents
                ],
                'quantity' => $details['quantite'], // Accède à la quantité comme ceci
            ];
        }

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?payment=success',
            // 'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url, 303);
    }

    public function success(Request $request) {
        // Ici, tu pourrais vérifier avec Stripe que le paiement a bien été effectué avant de valider la commande

        // Enregistrer la commande et les détails de commande en DB
        $cartItems = session('cart', []);

        if (count($cartItems) > 0) {
            $commande = new Commande();
            $commande->id_client = Auth::id(); // ou null si pas connecté
            $commande->date_commande = now();
            $commande->statut = 'payé';
            $commande->montant_total = array_sum(array_map(function ($item) {
                return $item['quantity'] * Produit::find($item['id'])->prix;
            }, $cartItems));
            $commande->save();

            foreach ($cartItems as $item) {
                $detailsCommande = new DetailsCommande();
                $detailsCommande->id_commande = $commande->id;
                $detailsCommande->id_produit = $item['id'];
                $detailsCommande->quantite = $item['quantity'];
                $detailsCommande->prix_unitaire = Produit::find($item['id'])->prix;
                $detailsCommande->save();

                // Mise à jour du stock
                $produit = Produit::find($item['id']);
                $produit->stock -= $item['quantity'];
                $produit->save();
            }

            // Vider le panier
            session()->forget('cart');
        }

        $produits = Produit::all();
        return view('home', compact('produits'))->with('success', 'Paiement réussi et commande enregistrée.');
    }
}

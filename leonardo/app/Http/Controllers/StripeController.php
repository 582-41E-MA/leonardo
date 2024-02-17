<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;


class StripeController extends Controller {


    public function checkout() {
        
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $session = StripeSession::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'cad',
                'product_data' => [
                    'name' => 'Exemple de produit',
                ],
                'unit_amount' => 2000, // Prix en cents
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('success') . '?payment=success',
        'cancel_url' => route('checkout'),
    ]);
 
    return redirect($session->url, 303);
}



    public function success() {

        $produits = Produit::all(); 
        return view('home', compact('produits'));

    }

}

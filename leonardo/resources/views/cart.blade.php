@extends('master')
@section('title', 'Shopping Cart')
@section('content')
<div class="container">
    <h1>Panier</h1>
    @if(count($cartItems) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $item)
                    @php
                    $subtotal = $item->prix * $item->quantite; // Assure-toi que ces propriétés correspondent à celles de tes objets
                    $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item->nom_produit }}</td>
                        <td>{{ $item->quantite }}</td>
                        <td>${{ number_format($item->prix, 2) }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Total</td>
                    <td>${{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('checkout') }}" class="btn btn-primary">Procéder au paiement</a>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection

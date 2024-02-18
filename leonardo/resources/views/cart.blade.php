@extends('master') 
@section('title', 'Shopping Cart')
@section('content')
<div class="container mt-4">
    <h2>Votre Panier</h2>
    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $details)
                    @php
                    $subtotal = $details['prix'] * $details['quantite'];
                    $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $details['nom'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantite" value="{{ $details['quantite'] }}" min="1" style="width: 60px;">
                                <button type="submit" class="btn btn-info btn-sm">Mettre à jour</button>
                            </form>
                        </td>
                        <td>${{ number_format($details['prix'], 2) }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Retirer tout</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                    <td colspan="2">${{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <a href="{{ route('checkout') }}" class="btn btn-primary">Procéder au Paiement</a>
        </div>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection

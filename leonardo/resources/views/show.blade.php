@extends('master')
@section('title', 'Produit')
@section('content')
        <!-- Product section-->
        <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <!-- Utilise l'attribut image_path du produit pour obtenir l'image -->
                <img class="card-img-top mb-5 mb-md-0" src="{{ asset($produit->image_path) }}" alt="{{ $produit->nom_produit }}" />
            </div>
            <div class="col-md-6">
                <!-- Utilise les attributs du produit comme le SKU, le nom, et le prix -->
                
                <h1 class="display-5 fw-bolder">{{ $produit->nom_produit }}</h1>
                <p class="">{{ $produit->fabricant }}</p>
                <div class="fs-5 mb-5">
                    <!-- Affiche l'ancien prix et le nouveau prix si disponible -->
                    @if ($produit->ancien_prix)
                        <span class="text-decoration-line-through">${{ number_format($produit->ancien_prix, 2) }}</span>
                    @endif
                    <span>${{ number_format($produit->prix, 2) }}</span>
                </div>
                <!-- Utilise la description du produit -->
                <p class="lead">{{ $produit->description }}</p>
                <p class=""><span><strong>Fonctionnalités </strong></span>: {{ $produit->fonctionnalites }}</p>
                <p class=""><span><strong>Matériaux </strong></span> : {{ $produit->materiaux }}</p>
                <p class=""><span><strong>Technologie </strong></span> : {{ $produit->technologie }}</p>
                <p class=""><span><strong>Certifications </strong></span>:  {{ $produit->certifications }}</p>
            
              <!-- Affichage de l'inventaire -->
                <div class="mb-5">
                    <span><strong>En stock :</strong> {{ $produit->stock }} </span>
                </div>

             
                <!-- Formulaire pour ajouter le produit au panier -->
                <form action="{{ route('cart.add', $produit->id) }}"class="d-flex"  method="POST">
                    @csrf
                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                    <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="number" value="1" style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                       Ajouter au panier
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>







        <!-- Related items section-->
        <section class="py-5 bg-light">

    

        </section>

        @endsection
@extends('master')
@section('title', 'Produit')
@section('content')
        <!-- Product section-->
        <section class="py-5" >
    <div class="container px-4 px-lg-5 my-5 p-4" style="background-color: var(--couleur-carte);">
        <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6 text-center">

    <img src="{{ asset('images/leo.jpg') }}" alt="{{ $produit->nom_produit }}" class="card-img-top mb-4 mb-md-0 img-thumbnail img-fluid w-50 zoomable " style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-top: 20px; "> 

    <!-- Section du prix -->
    <div class="fs-5 mb-5" style="margin-top: 20px;"> <!-- Ajout de la marge en haut -->
        <!-- Affiche l'ancien prix et le nouveau prix si disponible -->
        @if ($produit->ancien_prix)
            <span class="text-decoration-line-through">${{ number_format($produit->ancien_prix, 2) }}</span>
        @endif
        <span>${{ number_format($produit->prix, 2) }}</span>
    </div>
    </div>
            
            <div class="col-md-6 p-4">
                <!-- Utilise les attributs du produit comme le SKU, le nom, et le prix -->
                
                <h1 class="display-5 fw-bolder">{{ $produit->nom_produit }}</h1>
                <p class="">{{ $produit->fabricant }}</p>
               
                <!-- Utilise la description du produit -->
                <p class="lead">{{ $produit->description }}</p>
                <p class=""><span><strong>Fonctionnalités </strong></span>: {{ $produit->fonctionnalites }}</p>
                <p class=""><span><strong>Matériaux </strong></span> : {{ $produit->materiaux }}</p>
                <p class=""><span><strong>Technologie </strong></span> : {{ $produit->technologie }}</p>
                <p class=""><span><strong>Certifications </strong></span>:  {{ $produit->certifications }}</p>
            
              

             
                <!-- Formulaire pour ajouter le produit au panier -->
                <form class="d-flex"  method="POST">
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

      
@endsection
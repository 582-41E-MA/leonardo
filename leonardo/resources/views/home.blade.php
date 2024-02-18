
@extends('master')
@section('title', 'Home')
@section('content')

        <!-- Section-->
        <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
            @foreach ($produits as $produit)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
<!--                   
                        <img src="{{$produit->image_path}}" alt="{{ $produit->nom_produit }}" class="card-img-top"> -->
                        <img src="{{ asset('images/leo.jpg') }}" alt="{{ $produit->nom_produit }}" class="card-img-top">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $produit->nom_produit }}</h5>
                                <!-- Product price-->
                                ${{ number_format($produit->prix, 2) }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
    <a class="btn btn-outline-dark mt-auto" href="{{ route('produit.show', ['id' => $produit->id]) }}">
        Voir les détails
    </a>
</div>

                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</section>

@endsection
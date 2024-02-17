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
                  
                        <img src="{{ asset($produit->image_path) }}" alt="{{ $produit->nom_produit }}" class="card-img-top">

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

<!-- Modal de succès de paiement -->
<div class="modal" tabindex="-1" role="dialog" id="paymentSuccessModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Paiement Réussi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          
        </button>
      </div>
      <div class="modal-body">
        <p>Merci pour votre achat !</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const urlParams = new URLSearchParams(window.location.search);
  const payment = urlParams.get('payment');
  
  if (payment === 'success') {
    var modal = new bootstrap.Modal(document.getElementById('paymentSuccessModal'));
    modal.show();
  }
});

</script>


@endsection
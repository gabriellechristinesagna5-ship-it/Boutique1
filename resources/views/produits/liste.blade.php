@extends('gabarit')
@section('contenu')
<h2>Nos produits</h2>
<div class="row g-3 mt-2">
    @foreach($produits as $produit)
    <div class="col-md-4">
        <div class="card h-100">
            @php $cardImage = $produit->images[0] ?? $produit->image ?? null; @endphp
            @if($cardImage)
                <img src="{{ asset('storage/'.$cardImage) }}" class="card-img-top" alt="{{ $produit->nom }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $produit->nom }}</h5>
                <p class="fw-bold text-success">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
                <a href="{{ route('produit.detail', $produit->id) }}" class="btn btn-outline-dark btn-sm">Voir</a>
                <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-dark btn-sm">Ajouter au panier</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
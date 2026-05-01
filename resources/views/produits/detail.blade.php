@extends('gabarit')
@push('styles')
<style>
    @media (max-width: 768px) {
        .product-detail-image {
            height: 250px !important;
        }
        .product-thumbnail {
            width: 60px !important;
        }
        .product-title {
            font-size: 1.5rem;
        }
        .product-price {
            font-size: 1.2rem;
        }
    }
    @media (max-width: 480px) {
        .product-detail-image {
            height: 200px !important;
        }
        .product-thumbnail {
            width: 50px !important;
        }
        .product-title {
            font-size: 1.3rem;
        }
        .product-price {
            font-size: 1.1rem;
        }
        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }
        .livraison-gratuite .badge {
            font-size: 0.9rem;
            padding: 0.5rem 0.8rem;
            font-weight: 500;
        }
    }
    @media (max-width: 480px) {
        .livraison-gratuite .badge {
            font-size: 0.8rem;
            padding: 0.4rem 0.6rem;
        }
    }
</style>
@endpush
@section('contenu')
<div class="row">
    <div class="col-md-5">
        @php $detailImage = $produit->images[0] ?? $produit->image ?? null; @endphp
        @if($detailImage)
            <img src="{{ asset('storage/'.$detailImage) }}" class="img-fluid rounded product-detail-image" alt="{{ $produit->nom }}">
        @else
            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded product-detail-image">Pas d'image</div>
        @endif

        @if(!empty($produit->images) && count($produit->images) > 1)
            <div class="mt-3 d-flex flex-wrap gap-2">
                @foreach($produit->images as $photo)
                    <img src="{{ asset('storage/'.$photo) }}" width="80" class="rounded product-thumbnail">
                @endforeach
            </div>
        @endif

        @if(!empty($produit->videos))
            <div class="mt-3">
                @foreach($produit->videos as $video)
                    <video width="100%" controls class="mb-2 rounded">
                        <source src="{{ asset('storage/'.$video) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la vidéo.
                    </video>
                @endforeach
            </div>
        @endif
    </div>
    <div class="col-md-7">
        <h2 class="product-title">{{ $produit->nom }}</h2>
        <p class="text-muted">{{ $produit->description }}</p>
        <h3 class="text-success fw-bold product-price">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</h3>

        @if($produit->stock > 0)
            <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                @csrf
                <button class="btn btn-dark btn-lg">🛒 Ajouter au panier</button>
            </form>
        @else
            <button class="btn btn-secondary btn-lg" disabled>Rupture de stock</button>
        @endif

        <a href="{{ route('accueil') }}" class="btn btn-outline-secondary mt-2">← Retour à la boutique</a>
    </div>
</div>
@endsection
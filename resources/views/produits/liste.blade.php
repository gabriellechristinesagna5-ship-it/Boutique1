@extends('gabarit')

@push('styles')
<style>
    .sen-product-grid .card {
        border: 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 14px 30px rgba(11,34,64,.08);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .sen-product-grid .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 36px rgba(11,34,64,.12);
    }
    .sen-product-grid .card-img-top {
        height: 240px;
        object-fit: cover;
        background: #f8fafc;
    }
    .sen-section-title {
        font-weight: 800;
        color: #0b2240;
    }
    .sen-section-subtitle {
        color: #6b7280;
        max-width: 720px;
    }
    
    /* Responsive improvements */
    @media (max-width: 768px) {
        .sen-product-grid .card-img-top {
            height: 180px;
        }
        .sen-section-title {
            font-size: 1.5rem;
        }
        .sen-section-subtitle {
            font-size: 0.9rem;
        }
    }
    
    @media (max-width: 480px) {
        .sen-product-grid .card-img-top {
            height: 150px;
        }
        .sen-section-title {
            font-size: 1.3rem;
        }
        .sen-section-subtitle {
            font-size: 0.85rem;
        }
        .sen-product-grid .card {
            border-radius: 15px;
        }
        .livraison-gratuite .badge {
            font-size: 0.75rem;
            padding: 0.4rem 0.6rem;
            font-weight: 500;
        }
    }
    @media (max-width: 480px) {
        .livraison-gratuite .badge {
            font-size: 0.7rem;
            padding: 0.3rem 0.5rem;
        }
    }
</style>
@endpush

@section('contenu')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
    <div>
        <h2 class="sen-section-title mb-2">Nos produits</h2>
        <p class="sen-section-subtitle mb-0">
            Retrouvez la sélection SenMarket et commandez en quelques clics.
        </p>
    </div>
</div>

<div class="row g-4 sen-product-grid">
    @forelse($produits as $produit)
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card h-100">
                @php $cardImage = $produit->images[0] ?? $produit->image ?? null; @endphp
                @if($cardImage)
                    <img src="{{ asset('storage/'.$cardImage) }}" class="card-img-top" alt="{{ $produit->nom }}">
                @else
                    <div class="card-img-top d-flex align-items-center justify-content-center text-secondary">Aucune image</div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $produit->nom }}</h5>
                    <p class="fw-bold text-success fs-5 mb-3">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
                    <div class="mt-auto d-flex gap-2 flex-wrap">
                        <a href="{{ route('produit.detail', $produit->id) }}" class="btn btn-outline-dark btn-sm">Voir</a>
                        <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-primary btn-sm" style="background: #0b2240; border-color: #0b2240;">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-light border text-center mb-0">Aucun produit disponible pour le moment.</div>
        </div>
    @endforelse
</div>
@endsection

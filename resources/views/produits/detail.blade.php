@extends('gabarit')
@section('contenu')
<div class="row">
    <div class="col-md-5">
        @php $detailImage = $produit->images[0] ?? $produit->image ?? null; @endphp
        @if($detailImage)
            <img src="{{ asset('storage/'.$detailImage) }}" class="img-fluid rounded" alt="{{ $produit->nom }}">
        @else
            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="height:300px">Pas d'image</div>
        @endif

        @if(!empty($produit->images) && count($produit->images) > 1)
            <div class="mt-3 d-flex flex-wrap gap-2">
                @foreach($produit->images as $photo)
                    <img src="{{ asset('storage/'.$photo) }}" width="80" class="rounded">
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
        <h2>{{ $produit->nom }}</h2>
        <p class="text-muted">{{ $produit->description }}</p>
        <h3 class="text-success fw-bold">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</h3>

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
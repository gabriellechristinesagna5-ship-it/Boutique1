@extends('admin.gabarit_admin')
@section('contenu_admin')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.produits.index') }}" class="btn btn-outline-secondary btn-sm">← Retour</a>
    <h4 class="fw-bold mb-0">
        {{ isset($produit) ? 'Modifier : '.$produit->nom : 'Ajouter un produit' }}
    </h4>
</div>

<div class="card carte-stat" style="max-width:680px">
    <div class="card-body">
        <form action="{{ isset($produit) ? route('admin.produits.update', $produit->id) : route('admin.produits.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($produit)) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label fw-semibold">Nom du produit</label>
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                       value="{{ old('nom', $produit->nom ?? '') }}" required>
                @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $produit->description ?? '') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Prix (FCFA)</label>
                    <input type="number" name="prix" class="form-control @error('prix') is-invalid @enderror"
                           value="{{ old('prix', $produit->prix ?? '') }}" min="0" step="1" required>
                    @error('prix') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Stock</label>
                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                           value="{{ old('stock', $produit->stock ?? 0) }}" min="0" required>
                    @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Photos du produit</label>
                @if(isset($produit) && !empty($produit->images))
                    <div class="mb-2 d-flex flex-wrap gap-2">
                        @foreach($produit->images as $photo)
                            <img src="{{ asset('storage/'.$photo) }}" height="80" class="rounded">
                        @endforeach
                    </div>
                @endif
                <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple>
                @error('images') <div class="invalid-feedback">{{ $message }}</div> @enderror
                @error('images.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Vidéos du produit</label>
                @if(isset($produit) && !empty($produit->videos))
                    <div class="mb-2 d-flex flex-wrap gap-2">
                        @foreach($produit->videos as $video)
                            <video width="140" controls>
                                <source src="{{ asset('storage/'.$video) }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture vidéo.
                            </video>
                        @endforeach
                    </div>
                @endif
                <input type="file" name="videos[]" class="form-control @error('videos') is-invalid @enderror" accept="video/*" multiple>
                @error('videos') <div class="invalid-feedback">{{ $message }}</div> @enderror
                @error('videos.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-dark px-4">
                {{ isset($produit) ? 'Enregistrer les modifications' : 'Créer le produit' }}
            </button>
        </form>
    </div>
</div>
@endsection
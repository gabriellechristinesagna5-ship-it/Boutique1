@extends('admin.gabarit_admin')
@section('contenu_admin')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">📦 Produits</h4>
    <a href="{{ route('admin.produits.create') }}" class="btn btn-dark">+ Ajouter un produit</a>
</div>

<div class="card carte-stat">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Image</th><th>Nom</th><th>Prix</th><th>Stock</th><th>Actions</th></tr>
            </thead>
            <tbody>
            @foreach($produits as $produit)
            <tr>
                <td>
                    @php
                        $thumbnail = $produit->images[0] ?? $produit->image ?? null;
                    @endphp
                    @if($thumbnail)
                        <img src="{{ asset('storage/'.$thumbnail) }}" width="50" height="50" class="rounded object-fit-cover">
                    @else
                        <div class="bg-secondary rounded" style="width:50px;height:50px"></div>
                    @endif
                </td>
                <td class="align-middle fw-semibold">{{ $produit->nom }}</td>
                <td class="align-middle">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                <td class="align-middle">
                    <span class="badge {{ $produit->stock == 0 ? 'bg-danger' : ($produit->stock < 5 ? 'bg-warning text-dark' : 'bg-success') }}">
                        {{ $produit->stock }}
                    </span>
                </td>
                <td class="align-middle">
                    <a href="{{ route('admin.produits.edit', $produit->id) }}" class="btn btn-sm btn-outline-primary">Modifier</a>
                    <form action="{{ route('admin.produits.destroy', $produit->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Supprimer ce produit ?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
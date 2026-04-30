@extends('admin.gabarit_admin')
@section('contenu_admin')

<h4 class="mb-4 fw-bold">Tableau de bord</h4>

<!-- Cartes statistiques -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card carte-stat p-3">
            <div class="text-muted small">Total produits</div>
            <div class="fs-2 fw-bold text-dark">{{ $totalProduits }}</div>
            <div class="text-danger small">{{ $produitsRupture }} en rupture</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card carte-stat p-3">
            <div class="text-muted small">Commandes aujourd'hui</div>
            <div class="fs-2 fw-bold text-dark">{{ $commandesAujourdhui }}</div>
            <div class="text-warning small">{{ $commandesEnAttente }} en attente</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card carte-stat p-3">
            <div class="text-muted small">Chiffre du mois</div>
            <div class="fs-2 fw-bold text-success">
                {{ number_format($chiffreMois, 0, ',', ' ') }}
            </div>
            <div class="text-muted small">FCFA</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card carte-stat p-3">
            <div class="text-muted small">Total clients</div>
            <div class="fs-2 fw-bold text-dark">{{ $totalClients }}</div>
            <div class="text-info small">inscrits</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <!-- Dernières commandes -->
    <div class="col-md-7">
        <div class="card carte-stat">
            <div class="card-header bg-white fw-bold border-0 pt-3">🛒 Dernières commandes</div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr><th>#</th><th>Client</th><th>Total</th><th>Statut</th><th></th></tr>
                    </thead>
                    <tbody>
                    @foreach($dernieresCommandes as $commande)
                    <tr>
                        <td class="text-muted">#{{ $commande->id }}</td>
                        <td>{{ $commande->utilisateur->name ?? '—' }}</td>
                        <td>{{ number_format($commande->prix_total, 0, ',', ' ') }} FCFA</td>
                        <td>
                            <span class="badge
                                @if($commande->statut == 'en_attente') bg-warning text-dark
                                @elseif($commande->statut == 'paye') bg-info
                                @else bg-success @endif">
                                {{ str_replace('_', ' ', $commande->statut) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.commandes.show', $commande->id) }}" class="btn btn-sm btn-outline-dark">Voir</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Produits faible stock -->
    <div class="col-md-5">
        <div class="card carte-stat">
            <div class="card-header bg-white fw-bold border-0 pt-3">⚠️ Stock faible</div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr><th>Produit</th><th>Stock</th><th></th></tr>
                    </thead>
                    <tbody>
                    @foreach($produitsFaibleStock as $produit)
                    <tr>
                        <td>{{ $produit->nom }}</td>
                        <td>
                            <span class="badge {{ $produit->stock == 0 ? 'bg-danger' : 'bg-warning text-dark' }}">
                                {{ $produit->stock }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.produits.edit', $produit->id) }}" class="btn btn-sm btn-outline-warning">Modifier</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
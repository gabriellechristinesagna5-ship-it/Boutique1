@extends('gabarit')
@section('contenu')
<h2>Mes commandes</h2>
@if($commandes->isEmpty())
    <p class="text-muted">Vous n'avez pas encore de commande.</p>
    @if(!auth()->user()->isAdmin())
        <a href="{{ route('accueil') }}" class="btn btn-dark">Aller faire des achats</a>
    @endif
@else
    @foreach($commandes as $commande)
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <span>Commande #{{ $commande->id }} — {{ $commande->created_at->format('d/m/Y H:i') }}</span>
            <span class="badge
                @if($commande->statut == 'en_attente') bg-warning text-dark
                @elseif($commande->statut == 'paye') bg-info
                @else bg-success
                @endif">
                {{ ucfirst(str_replace('_', ' ', $commande->statut)) }}
            </span>
        </div>
        <div class="card-body">
            <table class="table table-sm mb-0">
                <thead><tr><th>Produit</th><th>Quantité</th><th>Prix</th></tr></thead>
                <tbody>
                @foreach($commande->articles as $article)
                <tr>
                    <td>{{ $article->produit->nom ?? 'Produit supprimé' }}</td>
                    <td>{{ $article->quantite }}</td>
                    <td>{{ number_format($article->prix, 0, ',', ' ') }} FCFA</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <p class="fw-bold mb-0 mt-2">Total : {{ number_format($commande->prix_total, 0, ',', ' ') }} FCFA</p>
        </div>
    </div>
    @endforeach
@endif
@endsection
@extends('admin.gabarit_admin')
@section('contenu_admin')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.commandes.index') }}" class="btn btn-outline-secondary btn-sm">← Retour</a>
    <h4 class="fw-bold mb-0">Commande #{{ $commande->id }}</h4>
</div>

<div class="row g-3">
    <div class="col-md-8">
        <div class="card carte-stat">
            <div class="card-header bg-white fw-bold border-0 pt-3">Articles commandés</div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr><th>Produit</th><th>Prix unitaire</th><th>Quantité</th><th>Sous-total</th></tr>
                    </thead>
                    <tbody>
                    @foreach($commande->articles as $article)
                    <tr>
                        <td>{{ $article->produit->nom ?? 'Produit supprimé' }}</td>
                        <td>{{ number_format($article->prix, 0, ',', ' ') }} FCFA</td>
                        <td>{{ $article->quantite }}</td>
                        <td>{{ number_format($article->prix * $article->quantite, 0, ',', ' ') }} FCFA</td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="fw-bold">
                        <tr>
                            <td colspan="3">Total</td>
                            <td>{{ number_format($commande->prix_total, 0, ',', ' ') }} FCFA</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card carte-stat p-3">
            <h6 class="fw-bold mb-3">Informations</h6>
            <p><strong>Client :</strong> {{ $commande->utilisateur->name ?? '—' }}</p>
            <p><strong>Email :</strong> {{ $commande->utilisateur->email ?? '—' }}</p>
            <p><strong>Date :</strong> {{ $commande->created_at->format('d/m/Y H:i') }}</p>

            <hr>
            <h6 class="fw-bold mb-2">Changer le statut</h6>
            <form action="{{ route('admin.commandes.statut', $commande->id) }}" method="POST">
                @csrf @method('PUT')
                <select name="statut" class="form-select mb-2">
                    <option value="en_attente"   {{ $commande->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                    <option value="paye"          {{ $commande->statut == 'paye'       ? 'selected' : '' }}>Payé</option>
                    <option value="livre"         {{ $commande->statut == 'livre'      ? 'selected' : '' }}>Livré</option>
                </select>
                <button class="btn btn-dark w-100">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('admin.gabarit_admin')
@section('contenu_admin')
<h4 class="fw-bold mb-4">🛒 Toutes les commandes</h4>

<div class="card carte-stat">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Client</th><th>Date</th><th>Total</th><th>Statut</th><th>Actions</th></tr>
            </thead>
            <tbody>
            @foreach($commandes as $commande)
            <tr>
                <td class="text-muted">#{{ $commande->id }}</td>
                <td>{{ $commande->utilisateur->name ?? '—' }}<br>
                    <small class="text-muted">{{ $commande->utilisateur->email ?? '' }}</small>
                </td>
                <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                <td class="fw-semibold">{{ number_format($commande->prix_total, 0, ',', ' ') }} FCFA</td>
                <td>
                    <span class="badge
                        @if($commande->statut == 'en_attente') bg-warning text-dark
                        @elseif($commande->statut == 'paye') bg-info
                        @else bg-success @endif">
                        {{ str_replace('_', ' ', $commande->statut) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.commandes.show', $commande->id) }}" class="btn btn-sm btn-outline-dark">Détail</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $commandes->links() }}</div>
@endsection
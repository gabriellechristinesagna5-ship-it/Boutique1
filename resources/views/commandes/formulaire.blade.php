@extends('gabarit')
@section('contenu')
<h2>Confirmer votre commande</h2>
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header fw-bold">Récapitulatif</div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead><tr><th>Produit</th><th>Qté</th><th>Prix</th></tr></thead>
                    <tbody>
                    @foreach($panier as $id => $article)
                    <tr>
                        <td>{{ $article['nom'] }}</td>
                        <td>{{ $article['quantite'] }}</td>
                        <td>{{ number_format($article['prix'] * $article['quantite'], 0, ',', ' ') }} FCFA</td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="fw-bold">
                            <td colspan="2">Total</td>
                            <td>{{ number_format($total, 0, ',', ' ') }} FCFA</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header fw-bold">Informations de livraison</div>
            <div class="card-body">
                <p><strong>Nom :</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email :</strong> {{ auth()->user()->email }}</p>
                <p class="text-muted small">Le paiement se fait à la livraison.</p>
                <form action="{{ route('commande.valider') }}" method="POST">
                    @csrf
                    <button class="btn btn-success w-100 btn-lg">✅ Valider la commande</button>
                </form>
                <a href="{{ route('panier') }}" class="btn btn-outline-secondary w-100 mt-2">← Modifier le panier</a>
            </div>
        </div>
    </div>
</div>
@endsection
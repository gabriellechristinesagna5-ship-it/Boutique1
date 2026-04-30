@extends('gabarit')
@section('contenu')
<h2>Mon panier</h2>
@if(empty($panier))
    <p>Votre panier est vide.</p>
@else
<table class="table">
    <thead><tr><th>Produit</th><th>Prix</th><th>Quantité</th><th>Sous-total</th><th></th></tr></thead>
    <tbody>
    @foreach($panier as $id => $article)
    <tr>
        <td>{{ $article['nom'] }}</td>
        <td>{{ $article['prix'] }} FCFA</td>
        <td>{{ $article['quantite'] }}</td>
        <td>{{ $article['prix'] * $article['quantite'] }} FCFA</td>
        <td>
            <form action="{{ route('panier.supprimer', $id) }}" method="POST">
                @csrf <button class="btn btn-sm btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<h4>Total : {{ $total }} FCFA</h4>
@auth
    <a href="{{ route('commander') }}" class="btn btn-success">Commander</a>
@else
    <a href="{{ route('login') }}" class="btn btn-dark">Connectez-vous pour commander</a>
@endauth
@endif
@endsection
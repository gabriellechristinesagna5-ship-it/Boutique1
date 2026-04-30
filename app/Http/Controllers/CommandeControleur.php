<?php
namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\ArticleCommande;

class CommandeControleur extends Controller {

    public function afficherFormulaire() {
        $panier = session()->get('panier', []);
        if (empty($panier)) return redirect()->route('panier');
        $total = collect($panier)->sum(fn($a) => $a['prix'] * $a['quantite']);
        return view('commandes.formulaire', compact('panier', 'total'));
    }

    public function passerCommande() {
        $panier = session()->get('panier', []);
        if (empty($panier)) return redirect()->route('panier');

        $total = collect($panier)->sum(fn($a) => $a['prix'] * $a['quantite']);

        $commande = Commande::create([
            'utilisateur_id' => auth()->id(),
            'prix_total'     => $total,
            'statut'         => 'en_attente',
        ]);

        foreach ($panier as $id => $article) {
            ArticleCommande::create([
                'commande_id' => $commande->id,
                'produit_id'  => $id,
                'quantite'    => $article['quantite'],
                'prix'        => $article['prix'],
            ]);
        }

        session()->forget('panier');
        return redirect()->route('mes.commandes')->with('succes', 'Commande passée avec succès !');
    }

    public function mesCommandes() {
        $commandes = Commande::where('utilisateur_id', auth()->id())
                             ->with('articles.produit')
                             ->latest()->get();
        return view('commandes.liste', compact('commandes'));
    }
}
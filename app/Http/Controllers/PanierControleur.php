<?php
namespace App\Http\Controllers;
use App\Models\Produit;

class PanierControleur extends Controller {

    public function index() {
        $panier = session()->get('panier', []);
        $total = collect($panier)->sum(fn($a) => $a['prix'] * $a['quantite']);
        return view('panier.index', compact('panier', 'total'));
    }

    public function ajouter($id) {
        $produit = Produit::findOrFail($id);
        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            $panier[$id]['quantite']++;
        } else {
            $panier[$id] = [
                'nom'      => $produit->nom,
                'prix'     => $produit->prix,
                'image'    => $produit->image,
                'quantite' => 1,
            ];
        }

        session()->put('panier', $panier);
        return redirect()->back()->with('succes', 'Produit ajouté au panier !');
    }

    public function supprimer($id) {
        $panier = session()->get('panier', []);
        unset($panier[$id]);
        session()->put('panier', $panier);
        return redirect()->route('panier');
    }
}
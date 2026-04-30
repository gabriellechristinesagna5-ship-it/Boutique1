<?php
namespace App\Http\Controllers;
use App\Models\Produit;

class ProduitControleur extends Controller {

    public function index() {
        $produits = Produit::where('stock', '>', 0)->get();
        return view('produits.liste', compact('produits'));
    }

    public function afficher($id) {
        $produit = Produit::findOrFail($id);
        return view('produits.detail', compact('produit'));
    }
}
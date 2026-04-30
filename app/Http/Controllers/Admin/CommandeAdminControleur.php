<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Commande;

class CommandeAdminControleur extends Controller {

    public function index() {
        $commandes = Commande::with('utilisateur')->latest()->paginate(15);
        return view('admin.commandes.liste', compact('commandes'));
    }

    public function show($id) {
        $commande = Commande::with(['articles.produit', 'utilisateur'])->findOrFail($id);
        return view('admin.commandes.detail', compact('commande'));
    }

    public function changerStatut($id) {
        $commande = Commande::findOrFail($id);
        $commande->update(['statut' => request('statut')]);
        return redirect()->back()->with('succes', 'Statut mis à jour !');
    }
}
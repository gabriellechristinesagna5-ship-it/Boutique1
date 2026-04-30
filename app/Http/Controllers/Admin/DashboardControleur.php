<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\User;

class DashboardControleur extends Controller {
    public function index() {
        return view('admin.dashboard', [
            'totalProduits'       => Produit::count(),
            'produitsRupture'     => Produit::where('stock', 0)->count(),
            'commandesAujourdhui' => Commande::whereDate('created_at', today())->count(),
            'commandesEnAttente'  => Commande::where('statut', 'en_attente')->count(),
            'chiffreMois'         => Commande::whereMonth('created_at', now()->month)->sum('prix_total'),
            'totalClients'        => User::where('role', 'client')->count(),
            'dernieresCommandes'  => Commande::with('utilisateur')->latest()->take(8)->get(),
            'produitsFaibleStock' => Produit::where('stock', '<=', 5)->orderBy('stock')->take(8)->get(),
        ]);
    }
}
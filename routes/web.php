<?php

use App\Http\Controllers\ProduitControleur;
use App\Http\Controllers\PanierControleur;
use App\Http\Controllers\CommandeControleur;
use App\Http\Controllers\Admin\ProduitAdminControleur;
use App\Http\Controllers\Admin\DashboardControleur;
use App\Http\Controllers\Admin\CommandeAdminControleur;
use App\Http\Controllers\Admin\UtilisateurAdminControleur;
use Illuminate\Support\Facades\Route;

// Charger les routes d'authentification
require __DIR__.'/auth.php';

// --- Page d'accueil / landing page ---
Route::view('/', 'welcome')->name('landing');

// --- Boutique publique (ancienne page d'accueil) ---
Route::get('/boutique', [ProduitControleur::class, 'index'])->name('accueil');
Route::get('/produit/{id}', [ProduitControleur::class, 'afficher'])->name('produit.detail');

// --- Panier ---
Route::get('/panier', [PanierControleur::class, 'index'])->name('panier');
Route::post('/panier/ajouter/{id}', [PanierControleur::class, 'ajouter'])->name('panier.ajouter');
Route::post('/panier/supprimer/{id}', [PanierControleur::class, 'supprimer'])->name('panier.supprimer');

// --- Dashboard / redirection après connexion ---
Route::middleware('auth')->get('/dashboard', function () {
    return auth()->user()->isAdmin()
        ? redirect()->route('admin.dashboard')
        : redirect()->route('accueil');
})->name('dashboard');

// --- Commandes (utilisateur connecté) ---
Route::middleware('auth')->group(function () {
    Route::get('/commander', [CommandeControleur::class, 'afficherFormulaire'])->name('commander');
    Route::post('/commander', [CommandeControleur::class, 'passerCommande'])->name('commande.valider');
    Route::get('/mes-commandes', [CommandeControleur::class, 'mesCommandes'])->name('mes.commandes');
});

// --- Admin ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardControleur::class, 'index'])->name('dashboard');
    Route::resource('produits', ProduitAdminControleur::class);
    Route::get('commandes', [CommandeAdminControleur::class, 'index'])->name('commandes.index');
    Route::get('commandes/{id}', [CommandeAdminControleur::class, 'show'])->name('commandes.show');
    Route::put('commandes/{id}/statut', [CommandeAdminControleur::class, 'changerStatut'])->name('commandes.statut');
    Route::get('utilisateurs', [UtilisateurAdminControleur::class, 'index'])->name('utilisateurs.index');
});

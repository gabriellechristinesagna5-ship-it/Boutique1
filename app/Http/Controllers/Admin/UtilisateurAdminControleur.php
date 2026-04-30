<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;

class UtilisateurAdminControleur extends Controller {
    public function index() {
        $utilisateurs = User::withCount('commandes')->latest()->paginate(20);
        return view('admin.utilisateurs.liste', compact('utilisateurs'));
    }
}
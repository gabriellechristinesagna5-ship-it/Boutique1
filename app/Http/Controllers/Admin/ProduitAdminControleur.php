<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitAdminControleur extends Controller {

    public function index() {
        $produits = Produit::all();
        return view('admin.produits.liste', compact('produits'));
    }

    public function create() {
        return view('admin.produits.formulaire');
    }

    public function store(Request $request) {
        $donnees = $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix'        => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
            'videos'      => 'nullable|array',
            'videos.*'    => 'mimetypes:video/mp4,video/ogg,video/webm|max:10240',
        ]);

        if ($request->hasFile('images')) {
            $donnees['images'] = [];
            foreach ($request->file('images') as $image) {
                $donnees['images'][] = $image->store('produits/images', 'public');
            }
        }

        if ($request->hasFile('videos')) {
            $donnees['videos'] = [];
            foreach ($request->file('videos') as $video) {
                $donnees['videos'][] = $video->store('produits/videos', 'public');
            }
        }

        Produit::create($donnees);
        return redirect()->route('admin.produits.index')->with('succes', 'Produit créé !');
    }

    public function edit(Produit $produit) {
        return view('admin.produits.formulaire', compact('produit'));
    }

    public function update(Request $request, Produit $produit) {
        $donnees = $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix'        => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
            'videos'      => 'nullable|array',
            'videos.*'    => 'mimetypes:video/mp4,video/ogg,video/webm|max:10240',
        ]);

        if ($request->hasFile('images')) {
            $donnees['images'] = [];
            foreach ($request->file('images') as $image) {
                $donnees['images'][] = $image->store('produits/images', 'public');
            }
        }

        if ($request->hasFile('videos')) {
            $donnees['videos'] = [];
            foreach ($request->file('videos') as $video) {
                $donnees['videos'][] = $video->store('produits/videos', 'public');
            }
        }

        $produit->update($donnees);
        return redirect()->route('admin.produits.index')->with('succes', 'Produit modifié !');
    }

    public function destroy(Produit $produit) {
        $produit->delete();
        return redirect()->route('admin.produits.index')->with('succes', 'Produit supprimé !');
    }
}
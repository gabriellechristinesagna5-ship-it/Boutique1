<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model {
    protected $table = 'commandes';
    protected $fillable = ['utilisateur_id', 'prix_total', 'statut'];

    public function articles() {
        return $this->hasMany(ArticleCommande::class, 'commande_id');
    }

    public function utilisateur() {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
}
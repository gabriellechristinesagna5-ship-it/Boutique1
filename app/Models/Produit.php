<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model {
    protected $table = 'produits';
    protected $fillable = ['nom', 'description', 'prix', 'image', 'images', 'videos', 'stock'];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];

    public function articles() {
        return $this->hasMany(ArticleCommande::class, 'produit_id');
    }
}
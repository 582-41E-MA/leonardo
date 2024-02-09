<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class Produit extends Model

{
    use HasFactory;

    protected $table = 'Produits';

    protected $fillable = ['nom_produit', 'description', 'prix', 'stock', 'categorie', 'image_url', 'model', 'image_path'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetailsCommande extends Model
{
    use HasFactory;

    protected $table = 'DetailsCommande';

    protected $fillable = ['id_commande', 'id_produit', 'quantite', 'prix_unitaire'];
}
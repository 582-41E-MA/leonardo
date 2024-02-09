<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'Commandes';

    protected $fillable = ['id_client', 'date_commande', 'statut', 'montant_total'];
}
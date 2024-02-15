<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Detailscommande
 * 
 * @property int $id
 * @property int|null $id_commande
 * @property int|null $id_produit
 * @property int $quantite
 * @property float $prix_unitaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Commande|null $commande
 * @property Produit|null $produit
 *
 * @package App\Models
 */
class Detailscommande extends Model
{
	protected $table = 'detailscommande';

	protected $casts = [
		'id_commande' => 'int',
		'id_produit' => 'int',
		'quantite' => 'int',
		'prix_unitaire' => 'float'
	];

	protected $fillable = [
		'id_commande',
		'id_produit',
		'quantite',
		'prix_unitaire'
	];

	public function commande()
	{
		return $this->belongsTo(Commande::class, 'id_commande');
	}

	public function produit()
	{
		return $this->belongsTo(Produit::class, 'id_produit');
	}
}

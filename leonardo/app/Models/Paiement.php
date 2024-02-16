<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paiement
 * 
 * @property int $id
 * @property int|null $id_commande
 * @property Carbon $date_paiement
 * @property float $montant
 * @property string $id_stripe
 * @property string $statut
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Commande|null $commande
 *
 * @package App\Models
 */
class Paiement extends Model
{
	protected $table = 'paiements';

	protected $casts = [
		'id_commande' => 'int',
		'date_paiement' => 'datetime',
		'montant' => 'float'
	];

	protected $fillable = [
		'id_commande',
		'date_paiement',
		'montant',
		'id_stripe',
		'statut'
	];

	public function commande()
	{
		return $this->belongsTo(Commande::class, 'id_commande');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commande
 * 
 * @property int $id
 * @property int|null $id_client
 * @property Carbon $date_commande
 * @property string $statut
 * @property float $montant_total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Client|null $client
 * @property Collection|Detailscommande[] $detailscommandes
 * @property Collection|Paiement[] $paiements
 *
 * @package App\Models
 */
class Commande extends Model
{
	protected $table = 'commandes';

	protected $casts = [
		'id_client' => 'int',
		'date_commande' => 'datetime',
		'montant_total' => 'float'
	];

	protected $fillable = [
		'id_client',
		'date_commande',
		'statut',
		'montant_total'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'id_client');
	}

	public function detailscommandes()
	{
		return $this->hasMany(Detailscommande::class, 'id_commande');
	}

	public function paiements()
	{
		return $this->hasMany(Paiement::class, 'id_commande');
	}
}

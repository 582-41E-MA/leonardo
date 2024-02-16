<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $adresse
 * @property string|null $mot_de_passe
 * @property bool|null $est_invité
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Commande[] $commandes
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';

	protected $casts = [
		'est_invité' => 'bool'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'email',
		'adresse',
		'mot_de_passe',
		'est_invité'
	];

	public function commandes()
	{
		return $this->hasMany(Commande::class, 'id_client');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Produit
 * 
 * @property int $id
 * @property string $nom_produit
 * @property string|null $description
 * @property string $model
 * @property float $prix
 * @property int $stock
 * @property string|null $categorie
 * @property string|null $image_url
 * @property string|null $image_path
 * @property string|null $materiaux
 * @property string|null $technologie
 * @property string|null $fonctionnalites
 * @property string|null $certifications
 * @property string|null $fabricant
 * @property Carbon|null $date_de_lancement
 * 
 * @property Collection|Detailscommande[] $detailscommandes
 *
 * @package App\Models
 */
class Produit extends Model
{
	protected $table = 'produits';
	public $timestamps = false;

	protected $casts = [
		'prix' => 'float',
		'stock' => 'int',
		'date_de_lancement' => 'datetime'
	];

	protected $fillable = [
		'nom_produit',
		'description',
		'model',
		'prix',
		'stock',
		'categorie',
		'image_url',
		'image_path',
		'materiaux',
		'technologie',
		'fonctionnalites',
		'certifications',
		'fabricant',
		'date_de_lancement'
	];

	public function detailscommandes()
	{
		return $this->hasMany(Detailscommande::class, 'id_produit');
	}
}

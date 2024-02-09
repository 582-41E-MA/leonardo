<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'Clients';

    protected $fillable = ['nom', 'prenom', 'email', 'adresse', 'mot_de_passe', 'est_invité'];
}
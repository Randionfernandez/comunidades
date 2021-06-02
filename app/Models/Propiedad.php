<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends Model
{
	use HasFactory;
	use SoftDeletes;
	protected $table = "propiedades";
	protected $fillable = [
		'comunidades_id',
		'users_id',
		'ref_ca',
		'parte',
		'coeficiente',
		'tipo',
		'observaciones'
	];

//relaciones
	public function comunidad() {
		return $this->belongsTo(Comunidad::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class)->withTimestamps();
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
	use HasFactory;
	use SoftDeletes;
	protected $table = "propietarios";
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'num_cta',
		'ref_ca',
		'user_id',
		'propiedad_id'

	];

	public function user()
	{
		return $this->belongsTo(Propietario::class)->withTimestamps();
	}

	public function propiedad()
	{
		return $this->hasOne(Propiedad::class)->withTimestamps();
	}
}

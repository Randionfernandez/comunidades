<?php

namespace App\Models;

use App\Models\Comunidad;
use App\Models\User;
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

	/** fucnion scope de busqueda con una query que se anida a la petición principal de sql, recibe el primer parámetro obligatorio que es un consulta y el otro parametro opcinal que es el termino de búsqueda,en esete caso se envia lo que estamos escribiendo en el campo, busca una subquery con el campo de la tabla foranea  */
	public function scopeTermino($query,$termino){
		if ($termino === '') {
    return; //termino vacío para la funcion
	}
return $query->where('ref_ca','like',"%{$this->search}%")
->orWhereHas('users_id',function($query2) use ($termino){
	$query2->where('users_id','like',"%{$this->search}%");
});
// ->orWhereHas('comunidades_id',function($query2) use ($termino){
// 	$query2->where('comunidades_id','like',"%{$this->search}%");
// });
// ->orWhereHas('users_id',function($query2) use ($termino){

// 	->where('users_id','like',"%{$this->search}%");
// });

}

// public function scope(){

// }
}

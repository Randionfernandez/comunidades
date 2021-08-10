<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class ComunidadProveedor extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table = 'comunidad_proveedor';
	protected $dates = ['deleted_at'];

	 protected $fillable = [
        'comunidad_id',
        'proveedor_id'
        
    ];
    
}
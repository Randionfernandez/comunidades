<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Propietario extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $table = "propietarios";

    protected $fillable = [

        "name",
        "apellido1",
        "apellido2",
        "tipo",
        "fecha",
        'nif',
        'telefono',
        'calle',
        'portal',
        'bloque',
        'escalera',
        'piso',
        'puerta',
        'codigo_pais',
        'cp',
        'pais',
        'provincia',
        'localidad'
    ];

    public function user()
{
  return $this->belongsTo(User::class)->withTimestamps();
}


     public function propiedad()
    {
         return $this->hasOne(Propiedad::class)->withTimestamps();
    }
}

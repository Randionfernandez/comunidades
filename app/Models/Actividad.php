<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model {

    use HasFactory;

    protected $table = 'actividades';
    protected $keyType = 'string';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
    
    protected $fillable = [
        'codigo',
        'actividad'
    ];

}
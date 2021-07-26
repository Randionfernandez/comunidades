<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisa extends Model {
    
    protected $table = 'divisas';
    protected $keyType = 'string';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
    
    protected $fillable = [
        'codigo',
        'nombre'
    ];    
}
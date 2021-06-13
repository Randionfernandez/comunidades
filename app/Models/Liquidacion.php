<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liquidacion extends Model
{
    use HasFactory;

    protected $table = 'liquidacions';

    protected $fillable = [
        'tipo',
        'desde',
        'hasta'
    ];
}

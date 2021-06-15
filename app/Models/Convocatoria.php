<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;
     protected $fillable = [
        'email',//convocados
        'primera_conv',
        'segunda_conv',
        'user_email',//quien convoca
        'orden_dia',

    ];
     public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}

<?php

namespace App\Models;
use App\Models\Role;
use App\Models\User;
use App\Models\Comunidad;
use App\Models\Propiedad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;

    protected $fillable = [
        'presentes',//user_email
        'representados',//text con el nombre de la persona
        'acuerdos',

    ];
     public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}

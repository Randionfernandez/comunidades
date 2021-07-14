<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    // use HasFactory; 
    // El RoleSeeder  genera los roles necesarios sin usar Factory
    
    protected $fillable = [
        'role',
        'descripcion',
        'activo',
    ];
    
// Eliminar si no se justifica la relación usuarios
    public function usuarios() {
        return $this->belongsToMany('user')->withTimestamps();
    }
}
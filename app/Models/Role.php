<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    use HasFactory;

    protected $fillable = [
        'role',
        'descripcion',
        'activo',
    ];

    public function usuarios() {
        return $this->belongsToMany(User::class, 'comunidad_user', 'role_id', 'user_id')->withTimestamps();
    }
}

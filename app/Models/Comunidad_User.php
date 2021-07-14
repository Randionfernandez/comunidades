<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad_User extends Model {

    use HasFactory;

    protected $table = 'comunidad_user';

    protected $fillable = [
        'comunidad_id',
        'user_id',
        'role_id'
    ];

    public function comunidades() {
        return $this->belongsToMany('comunidad')->withTimestamps();
    }

    public function usuarios() {
        return $this->belongsToMany('user')->withTimestamps();
    }

    public function roles() {
        return $this->belongsToMany('role')->withTimestamps();
    }
}     
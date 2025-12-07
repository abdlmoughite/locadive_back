<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
        use HasApiTokens;

    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom', 'email', 'password'];
    protected $hidden = ['password'];
}
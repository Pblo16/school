<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'fecha',
        'is_active',
    ];

    protected $hidden = [
        'password',
    ];
}

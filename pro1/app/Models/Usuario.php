<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'usuarios';
    //protected $primaryKey = 'codigo';
    protected $fillable =   
    [
        'identidad',
        'nombre_usuario',
        'telefono',
        'correo',
        'id_tipo_identidad',
        'id_ciudad',
    ];
}
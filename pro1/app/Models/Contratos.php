<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contratos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'contratos';
    //protected $primaryKey = 'codigo';
    protected $fillable =   
    [
        'n_lineas',
        'codigo',
        'fecha_activacion',
        'val_plan',
        'estado',
        'id_usuario',
    ];
}
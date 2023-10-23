<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ciudades extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ciudades';
    //protected $primaryKey = 'codigo';
    protected $fillable =   
    [
        'nombre_ciudad'
    ];
}
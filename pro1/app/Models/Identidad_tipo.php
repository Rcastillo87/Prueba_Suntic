<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Identidad_tipo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'identidad_tipo';
    //protected $primaryKey = 'codigo';
    protected $fillable =   
    [
        'nombre_tipo'
    ];
}
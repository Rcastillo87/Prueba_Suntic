<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Informacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'informacion';
    //protected $primaryKey = 'codigo';
    protected $fillable =   
    [
        'nombrearchivo',
        'cantlineas',
        'cantpalabras',
        'cantcaracteres',
        'fecharegistro'
    ];
}
<?php

namespace sisadmineiquia;

use Illuminate\Database\Eloquent\Model;

class PerfilPuesto extends Model
{
    protected $table='perfilpuesto';

    protected $primaryKey='idperfilpuesto';

    public $timestamps=false;


    protected $fillable =[
    	'profesion',
    	'reporta',
    	'sustituto',
    	'relaciones',
    	'responsabilidades',
    	'sustituye'
    ];
}

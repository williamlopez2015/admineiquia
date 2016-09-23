<?php

namespace sisadmineiquia;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table='puesto';

    protected $primaryKey='idpuesto';

    public $timestamps=false;


    protected $fillable =[
    	'iddepartamento',
    	'nombrepuesto',
    	'descripcionpuesto',
    	'salariopuesto'
    ];
}

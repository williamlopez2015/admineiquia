<?php


namespace sisadmineiquia;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tiempo extends Model
{
    //
    protected $table='tiempoadicional';
    protected $primaryKey='idtiempo';
    public $timestamps=false;

    protected $fillable=['idciclo','fechainicio','fechafin','descripcion'];
}


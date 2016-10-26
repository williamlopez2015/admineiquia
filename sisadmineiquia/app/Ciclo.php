<?php

namespace sisadmineiquia;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    //
    protected $table='ciclo';
    protected $primaryKey='idciclo';
    public $timestamps=false;

    protected $fillable=['nombreciclo'];
}

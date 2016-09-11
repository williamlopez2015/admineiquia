<?php


namespace sisadmineiquia;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    protected $table='empleado';
    protected $primaryKey='idempleado';
    public $timestamps=false;

    protected $fillable=['foto','primernombre','segundonombre','primerapellido','segundoapellido','dui','nit','isss','afp','estado'];

}

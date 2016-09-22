<?php

namespace sisadmineiquia;

use Illuminate\Database\Eloquent\Model;

class ExpedienteAdministrativo extends Model
{
    //
    protected $table='expedienteadminist';
    protected $primaryKey='idexpediente';
    public $timestamps=false;

    protected $fillable=['idempleado','idpuesto','fechaapertura','codigocontrato','tiempoadicionalinicio','tiempoadicionalfin','tiempointegralinicio','tiempointegralfin','descripcionadmin'];
}

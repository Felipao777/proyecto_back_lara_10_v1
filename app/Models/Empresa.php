<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='empresas';
    protected $primaryKey='id_empresa';

    public function trab_habs(){
        //return $this -> hasMany(Trab_hab::class,'id_empresa','id_trabajador_hab');
        return $this -> hasMany(Trab_hab::class,'id_empresa');
    }
}

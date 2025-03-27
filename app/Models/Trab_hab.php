<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trab_hab extends Model
{
    use HasFactory;
    protected $table='trabajador_habilitados';
    protected $primaryKey='id_trabajador_hab';
   
    public function empresa(){
        return $this -> belongsTo(Empresa::class,'id_empresa');
    }
    public function solicitantes(){
        return $this -> hasMany(Solicitante::class);
    }
    public function fiscals(){
        return $this -> hasMany(Fiscal::class);        
    }

    public function datos_grals_asmts(){
        return $this -> belongsToMany(Datos_grals_asmt::class,'trab_participan_asmts','id_trabajador_hab','id_dat_gral_asmt')->withTimestamps();
    }
}

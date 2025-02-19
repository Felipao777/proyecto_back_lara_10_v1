<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_grals_asmt extends Model
{
    use HasFactory;
    protected $primaryKey='id_dat_gral_asmt';

    public function fiscal(){
        return $this -> belongsTo(Fiscal::class);
    }
    public function solicitante(){
        return $this -> belongsTo(Solicitante::class);
    }    
    public function trab_hab(){
        return $this -> belongsTo(Trab_hab::class);
    }

    public function trab_habs(){
        return $this -> belongsToMany(Trab_hab::class, 'trab_participan_asmts','id_trabajador_hab','id_dat_gral_asmt')->withTimestamps();
    }
    public function maq_eqs(){
        return $this -> belongsToMany(Maq_eq::class,'aplica_asmts','id_maq_eq','id_dat_gral_asmt')->withTimestamps();
    }    
    public function medidas_risk_asmts(){
        return $this -> belongsToMany(Medidas_risk_asmt::class,'tiene_med_risks_asmt','id_med_risk_asmt','id_dat_gral_asmt')->withPivot(["aplica"])->withTimestamps();
    }
    public function epps_asmts(){
        return $this -> belongsToMany(Epps_asmt::class,'tiene_epps_asmts','id_epps_asmt','id_dat_gral_asmt')->withPivot(["aplica"])->withTimestamps();
    }
    public function aspec_cierre_asmts(){
        return $this -> belongsToMany(Aspec_cierre_asmt::class,'estar_aspec_cierr_asmts','id_dat_gral_asmt','id_asp_cierr_asmt')->withPivot(["aplica"])->withTimestamps();
    }
    public function aspectos_rev_asmts(){
        return $this -> belongsToMany(Aspectos_rev_asmt::class,'estar_aspec_rev_asmts','id_asp_rev_asmt','id_dat_gral_asmt')->withPivot(["aplica"])->withTimestamps();
    }


}

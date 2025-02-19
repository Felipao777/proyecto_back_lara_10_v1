<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidas_risk_asmt extends Model
{
    use HasFactory;
    protected $primaryKey='id_med_risk_asmt';

    public function tipo_riesgo(){
        return $this -> belongsTo(Tipo_riesgo::class);
    }

    public function datos_grals_asmts(){
        return $this -> belongsToMany(Datos_grals_asmt::class,'tiene_med_risks_asmt','id_med_risk_asmt','id_dat_gral_asmt')->withPivot(["aplica"])->withTimestamps();
    }
}
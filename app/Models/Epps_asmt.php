<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epps_asmt extends Model
{
    use HasFactory;
    protected $primaryKey='id_epps_asmt';

    public function epp(){
        return $this -> belongsTo(Epp::class);
    }
    public function datos_grals_asmts(){
        return $this -> belongsToMany(Datos_grals_asmt::class,'tiene_epps_asmts','id_epps_asmt','id_dat_gral_asmt')->withPivot(["aplica"])->withTimestamps();
    }
}

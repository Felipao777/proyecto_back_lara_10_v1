<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspec_cierre_asmt extends Model
{
    use HasFactory;
    protected $primaryKey='id_asp_cierr_asmt';

    public function aspec_cierr_trab(){
        return $this -> belongsTo(Aspec_cierr_trab::class);
    }

    public function datos_grals_asmts(){
        return $this -> belongsToMany(Datos_grals_asmt::class,'estar_aspec_cierr_asmts','id_dat_gral_asmt','id_asp_cierr_asmt')->withPivot(["aplica"])->withTimestamps();
    }
}

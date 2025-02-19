<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspectos_rev_asmt extends Model
{
    use HasFactory;
    protected $primaryKey='id_asp_rev_asmt';

    public function area_aspectos_asmt(){
        return $this -> belongsTo(Area_aspectos_asmt::class);
    }

    public function datos_grals_asmts(){
        return $this -> belongsToMany(Datos_grals_asmt::class,'estar_aspec_rev_asmts','id_asp_rev_asmt','id_dat_gral_asmt')->withPivot(["aplica"])->withTimestamps();
    }
}

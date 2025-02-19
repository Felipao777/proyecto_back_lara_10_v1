<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maq_eq extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table='maquinarias_equipos';
    protected $primaryKey='id_maq_eq';

    public function sector(){
        return $this -> belongsTo(Sector::class);
    }

    public function datos_grals_asmts(){
        return $this -> belongsToMany(Datos_grals_asmt::class,'aplica_asmts','id_maq_eq','id_dat_gral_asmt')->withTimestamps();
    }
}

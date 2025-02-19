<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_riesgo extends Model
{
    use HasFactory;
    protected $primaryKey='id_tipo_riisk';

    public function medidas_risk_asmts(){
        return $this -> hasMany(Medidas_risk_asmt::class);
    }
}

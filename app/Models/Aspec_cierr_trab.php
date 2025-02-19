<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspec_cierr_trab extends Model
{
    use HasFactory;
    protected $table='aspec_cierr_trab';
    protected $primaryKey='id_aspec_cierr_trab';

    public function aspec_cierre_asmts(){
        return $this -> hasMany(Aspec_cierre_asmt::class);
    }
}

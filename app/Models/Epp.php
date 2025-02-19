<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epp extends Model
{
    use HasFactory;
    protected $primaryKey='id_epp';

    public function epps_asmts(){
        return $this -> hasMany(Epps_asmt::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_aspectos_asmt extends Model
{
    use HasFactory;
    protected $primaryKey='id_area_aspec_asmt';

    public function aspectos_rev_asmts(){
        return $this -> hasMany(Aspectos_rev_asmt::class);
    }
}

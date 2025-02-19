<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura_gas_asmt extends Model
{
    use HasFactory;
    protected $primaryKey='id_lectura_gas_asmt';
    public function sectores(){
        return $this -> hasMany(Sector::class);
    }
}

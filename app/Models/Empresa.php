<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $primaryKey='id_empresa';

    public function trab_habs(){
        return $this -> hasMany(Trab_hab::class);
    }
}

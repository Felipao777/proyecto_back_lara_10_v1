<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $primaryKey='id_sector';

    public function area(){
        return $this -> belongsTo(Area::class);
    }
    public function maq_eqs(){
        return $this -> hasMany(Maq_eq::class);
    }



}

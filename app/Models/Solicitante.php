<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    use HasFactory;
    protected $primaryKey='id_solicitante';

    public function trab_habs(){
        return $this -> belongsTo(Trab_hab::class);
    }
}

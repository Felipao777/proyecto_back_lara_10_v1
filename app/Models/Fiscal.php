<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiscal extends Model
{
    use HasFactory;
    protected $table='fiscales';
    protected $primaryKey='id_fiscal';

    public function trab_hab(){
        return $this -> belongsTo(Trab_hab::class);
    }

}

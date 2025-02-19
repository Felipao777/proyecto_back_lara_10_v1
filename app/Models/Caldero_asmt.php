<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caldero_asmt extends Model
{
    use HasFactory;
    protected $primaryKey='id_caldero_asmt';
    public function sectores(){
        return $this -> hasMany(Sector::class);
    }
}

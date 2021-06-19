<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programm extends Model
{
    use HasFactory;

    protected $table = "programm";

    public function programmpunkt(){
        return $this->belongsToMany('App\Models\Programmpunkt');
    }
}

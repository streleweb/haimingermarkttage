<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programm extends Model
{
    use HasFactory;

    protected $table = "programm";

    protected $fillable = ['programm_titel', 'programm_beschreibung', 'programm_bild_url', 'created_at', 'updated_at'];

    public function programmpunkt(){
        return $this->belongsToMany('App\Models\Programmpunkt');
    }
}

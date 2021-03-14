<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ausstellerfoto extends Model
{
    use HasFactory;

    protected $table = "ausstellerfoto";

    //Fehlermeldung Laravel - updated_at und created_at
    public $timestamps = false;

    public function aussteller(){
        return $this->belongsTo('App\Models\Aussteller');
    }
}

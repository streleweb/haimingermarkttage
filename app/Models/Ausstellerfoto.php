<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ausstellerfoto extends Model
{
    use HasFactory;

    public function aussteller(){
        return $this->belongsTo('App\Models\Aussteller');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmpunkt extends Model
{
    use HasFactory;

    //Fehlermeldung Laravel - updated_at und created_at
    public $timestamps = false;

    protected $table = "programmpunkt";
}

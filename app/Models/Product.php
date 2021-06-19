<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Aussteller;//

class Product extends Model
{
    use HasFactory;

    protected $table = "product";

    public function aussteller(){

    return $this->belongsToMany(Aussteller::class, 'aussteller_product');
    }
}

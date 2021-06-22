<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Product;

class Aussteller extends Model
{
    use HasFactory;
    
    /*
    protected $fillable = ['aussteller_fullname'];*/

    protected $table = "aussteller"; //war aussteller_product
    
    /*
      Method for Many-to-Many Product-Relationship
     
    public function product(){

        return $this->belongsToMany(Product::class, 'aussteller_product');
    }

    
    
    public function ausstellerfoto(){
        return $this->hasOne('App\Models\Ausstellerfoto');
    }*/
}

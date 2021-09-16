<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Produkt;


class Aussteller extends Model
{
    use HasFactory;
    
    
    protected $fillable = ['aussteller_fullname', 'aussteller_beschreibung', 'aussteller_brandingname', 'aussteller_email', 'aussteller_websiteurl', 'aussteller_zonenfarbe', 'aussteller_bildurl'];


    protected $table = "aussteller";

    public function produktreiters()
    {
        return $this->belongsToMany(Produktreiter::class, 'aussteller_produktreiter', 'aussteller_id', 'produktreiter_id');
    }

    
    /*
      Method for Many-to-Many Product-Relationship
     
    public function product(){

        return $this->belongsToMany(Product::class, 'aussteller_product');
    }

    
    
    public function ausstellerfoto(){
        return $this->hasOne('App\Models\Ausstellerfoto');
    }*/
}

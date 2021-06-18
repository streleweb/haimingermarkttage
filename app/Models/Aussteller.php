<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Product;

class Aussteller extends Model
{
    use HasFactory;
    
    protected $fillable = ['aussteller_fullname'];

    protected $table = "aussteller"; //war aussteller_product
    
    /**
     * Method for Many-to-Many Product-Relationship
     */
    //maybe noch zu product umbenennen
    public function product(){

        return $this->belongsToMany(Product::class, 'aussteller_product');

        /*return $this->belongsToMany(RelatedModel, pivot_table_name, 
        foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);*/

        /*return $this->belongsToMany(
            Product::class,
            'aussteller_products',
            'aussteller_id',
            'product_id'
        );*/
    }
    /**
    * Ausstellerfoto mit Aussteller assoziieren mit One-to-One Beziehung
    */
    public function ausstellerfoto(){
        return $this->hasOne('App\Models\Ausstellerfoto');
    }
}

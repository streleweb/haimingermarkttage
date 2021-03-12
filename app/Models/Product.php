<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Aussteller;//

class Product extends Model
{
    use HasFactory;

    protected $table = "products";


       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'product_name'
    ];
*/
    public function aussteller(){

        return $this->belongsToMany(Aussteller::class, 'aussteller_product');
        /*return $this->belongsToMany(
            Aussteller::Class,
            'aussteller_products',
            'product_id',
            'aussteller_id'  
        );
    }*/
}
}

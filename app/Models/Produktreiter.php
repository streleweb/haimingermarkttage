<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produktreiter extends Model
{
    use HasFactory;

    protected $table = "produktreiter";

    protected $fillable = ['produkt_reiter_name'];

    public function ausstellers()
    {
        return $this->belongsToMany(Aussteller::class, 'aussteller_produktreiter', 'produktreiter_id', 'aussteller_id');
    }
}

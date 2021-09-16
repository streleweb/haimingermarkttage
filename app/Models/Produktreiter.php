<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Aussteller;

class Produktreiter extends Model
{
    use HasFactory;

    protected $table = "produktreiter";

    protected $fillable = ['produkt_reiter_name'];

    public function aussteller()
    {
        return $this->belongsToMany(Aussteller::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $fillable = ['news_titel', 'news_textfeld', 'news_bild_url', 'created_at', 'updated_at'];
    //Added for timestamps (created_at, updated_at)
    //Laravel updatet damit automatisch diese Datenfelder
    public $timestamps = true;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model {
    use HasFactory;

    protected $table = 'slider';
    protected $fillable = ["title", "author", "topic", "slider_image", "slider_thumbnail", "description", "read_more_url", "slider_visible"];

}

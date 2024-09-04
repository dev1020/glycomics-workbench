<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model {
    use HasFactory;

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'pages';
    protected $fillable = ["title", "meta_keywords", "meta_description", "slug", "body","page_layout"];

}

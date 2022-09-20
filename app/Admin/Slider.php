<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //

    protected $table = "sliders";
    protected $fillable = [ 
       "id",
       "slider_image",
       "slider_text",
       "title_1",
       "title_2",
       "banner_link",
       "position",

    ];
}

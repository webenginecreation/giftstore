<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'category_name',
        'category_slug',
        'category_banner',
        'category_icon',
    ];

     public function brands()
    {
    	//This features are temporory disabled
       return $this->belongsToMany(Brand::class, 'brand_category');
    }
}

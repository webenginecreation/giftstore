<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    //
    protected $table = "brands";

    protected $fillable = [
        
    		"id",
    		"brand_name",
    		"brand_slug",
    		"brand_icon",
    		"brand_status",
            "about_brand",
          ];


          
          
     public function getAll()
    {
        return static::all();
    }


    public function findBrand($id)
    {
        return static::find($id);
    }


    public function deleteBrand($id)
    {
        return static::find($id)->delete();
    }

    public function categories()
    {
      return $this->belongsToMany(Category::class, 'brand_category');
    }
}

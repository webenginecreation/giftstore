<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Admin\Blog;

class blogCategory extends Model
{
    //
    protected $table = "blog_category";
    protected $fillable = ["blog_category_name","blog_category_slug"];

      public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    
    

}

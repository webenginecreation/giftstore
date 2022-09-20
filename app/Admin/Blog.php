<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\blogCategory;


class Blog extends Model
{
    //

    protected $table = "blogs";
    protected $fillable = [

    	"blog_category_id",
        "blog_title",
        "blog_slug",
        "blog_images",
        "blog_video_link",
        "blog_details",
        "status",
        "blog_slug",
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_author',
      
       ];


      public static function getAllBlogsWithCategory()
    {
    	$blog = new Blog();
        return $blog->belongsTo(blogCategory::class,'blog_category_id','id');
    }

}

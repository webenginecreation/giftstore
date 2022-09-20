<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Category;
use App\Admin\Brand;
use App\Admin\Subcategory;
use App\User;
class Product extends Model
{
    //
     protected $fillable = [
         
        'category_id',
        'brand_id',
        'name',
        'slug',
        'images',
        'images1',
        'images2',
        'images3',
        'images4',
        'base_price',
        'discount_price',
        'CGST',
        'SGST',
        'size',
        'details',
        'Short_details',
        'product_link',
        'status',
        'stock_status',
        'sku',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_author',
        'stock_amount',
        'low_stock_alert',
        'notify_stock',
        'weight',
        'length',
        'width',
        'height',
        'affiliate_carrier',
        'specification',
        'additional_info',
        'youtube_url',
        'share_link',
        'tags',
        'images_allowed',
        'text_allowed',
        'reseller_price',
        'wholeseller_price',
        'shipping_charges'
        
    ];

     public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

     public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }


     public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

     public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}

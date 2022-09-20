<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Category;

class Subcategory extends Model
{
    //
    
    protected $fillable = [
        'sub_category_name',
        'sub_category_image',
        'category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}

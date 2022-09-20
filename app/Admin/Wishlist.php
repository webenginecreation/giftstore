<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Product;

class Wishlist extends Model
{
    //
    protected $table = "wishlist";

    protected $fillable = ['id', 'user_id', 'product_id'];

   

}

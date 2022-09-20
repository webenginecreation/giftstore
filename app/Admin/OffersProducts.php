<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Offers;
use App\Admin\Product;
class OffersProducts extends Model
{
    //
    
    protected $table = "offers_products";
    
    protected $fillable = [
        
        'offers_id',
        'product_id',
    
    ];
    
      public function hasOneOffers() {
        return $this->hasOne('App\Admin\Offers','id','offers_id');
    }

      public function hasOneProduct() {
        return $this->hasOne('App\Admin\Product','id','product_id');
    }
}

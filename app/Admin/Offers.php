<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\OffersProducts as OffersProducts;
class Offers extends Model
{
    //
    
    protected $table = "offers";
    
    protected $fillable = [
        'offers_name',
        'start_date',
        'end_date',
        'status',
    ];
    
    public function getAllOffersWithProducts()
    {
         return $this->hasMany('OffersProducts','offers_id','id');
    }
}

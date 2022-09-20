<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Product;


class Inventory extends Model
{
    //
    protected $table = "inventory";

    protected $fillable = ['id','product_id','quantity'];
         
     public function getAll()
    {
    	//return static::all();
        return static::select('inventory.*','products.id AS pro_id','products.name')->join('products','products.id','=','inventory.product_id')->get();
    }

      public function deleteInventory($id)
    {
        return static::find($id)->delete();
    }



    
}

<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;



class Order extends Model
{
    //

    protected $table = "orders";
    protected $fillable = [
        
        "user_id",
        "order_code",
        "order_name",
        "order_email",
        "order_phone",
        "order_address",
        "order_address2",
        "order_zip",
        "city",
        "order_notes",
        "payment",
        "status",
        "price",
        "payment_status",
        "order_lastname",
        "order_products",
        "state",
        "order_date",
        "total_amount"

       ];
    
   
}

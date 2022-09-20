<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    //

    protected $table = "site_config";
    protected $fillable = [

    		"store_name",
    		"currency",
    		"footer_text",
    		"logo",
    		"fevicon",
    		"mobile",
    		"facebook",
    		"twitter",
    		"instagram",
    		"skype",
    		"pinterest",
    		"email",
            "location",
    		"address",
            "additional_css",
            "additional_js",
            "",
            "city",
            "state",
    ];
}

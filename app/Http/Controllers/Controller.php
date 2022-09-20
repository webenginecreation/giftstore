<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Admin\Category;
use View;
use App\Admin\SiteConfig;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
  {
    $headerCategories = Category::where('status','1')->get();
    $siteConfig = SiteConfig::first();
    View::share('headerCategories', $headerCategories);
    View::share('siteConfig', $siteConfig);
  }
   
}
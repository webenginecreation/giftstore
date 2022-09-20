<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('site_config')->insert([
         	
            'store_name' => 'Biztria',
            'currency' => 'INR',
            'footer_text' => 'Powered By Biztria',
            'logo' => 'biztria-logo.jpg',
            'fevicon' => 'favicon-32x32.png',
            'email' => "infobiztria@gmail.com",
            'mobile' => "8866174302",
            'location' => 'INDIA',
            
        ]);
    }
}

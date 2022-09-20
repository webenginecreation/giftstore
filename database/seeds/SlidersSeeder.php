<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sliders')->insert([
         	'slider_image' => 'dummy-slider.png',
         ]);
    }
}

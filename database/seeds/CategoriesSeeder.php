<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    	DB::table('categories')->insert(array([
         	'category_name' => 'Clothings',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Electronics',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Furniture',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Books',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Jewelry',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Groceries',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Mobiles',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Footware',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Digital',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Watches',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
         	'category_name' => 'Accesories',
         	'status' => '1',
         	'created_at' => date('Y-m-d H:i:s'),
         	'updated_at' => date('Y-m-d H:i:s'),
         ]));
    }
}

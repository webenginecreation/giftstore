<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(SiteConfigSeeder::class);
         $this->call(SlidersSeeder::class);
         $this->call(CategoriesSeeder::class);
         //$this->call(UsersSeeder::class);
    }
}

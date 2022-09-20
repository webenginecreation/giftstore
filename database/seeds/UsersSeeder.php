<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

 $faker = Faker\Factory::create();
      
for($i = 0; $i < 1000; $i++) {

        App\User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'mobile' => $faker->number,
             'role' => '0',
            'status' => '1',
            'password' => Hash::make('123123')
        ]);
    }



	

	



    }
}

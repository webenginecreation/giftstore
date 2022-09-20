<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name');
			$table->string('last_name')->nullable();
			$table->string('email')->unique();
			$table->bigInteger('mobile')->unique();
			$table->enum('role', array('0','1','2'));
			$table->enum('status', array('0','1'));
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->integer('points')->nullable();
			$table->string('address_1')->nullable();
			$table->string('address_line_2')->nullable();
			$table->string('state')->nullable();
			$table->string('city')->nullable();
			$table->integer('Zip')->nullable();
			$table->string('shipping_address_1')->nullable();
			$table->string('shipping_address_2')->nullable();
			$table->string('shipping_state')->nullable();
			$table->string('shipping_city')->nullable();
			$table->integer('shipping_zip')->nullable();
			$table->timestamps();
			$table->enum('user_type', array('normal','reseller','wholeseller'))->default('normal');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

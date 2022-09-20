<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->index('user_id');
			$table->string('order_code');
			$table->string('order_name');
			$table->string('order_email');
			$table->string('order_phone');
			$table->text('order_address');
			$table->text('order_address2');
			$table->integer('order_zip');
			$table->string('city');
			$table->string('order_notes')->nullable();
			$table->enum('payment', array('cod','online'))->default('cod');
			$table->enum('status', array('Pending','Inprocess','Shipped','Delivered','Rejected','Cancle'))->nullable()->default('Pending');
			$table->string('order_lastname');
			$table->text('order_products');
			$table->string('state');
			$table->date('order_date');
			$table->string('total_amount');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}

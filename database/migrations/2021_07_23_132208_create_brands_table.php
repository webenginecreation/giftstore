<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brands', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('brand_name', 50);
			$table->string('brand_slug', 100);
			$table->text('brand_icon');
			$table->enum('brand_status', array('0','1'))->default('1')->comment('0 as inactive, 1 as active');
			$table->timestamps();
			$table->string('about_brand')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('brands');
	}

}

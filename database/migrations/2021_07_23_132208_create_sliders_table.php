<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('slider_image');
			$table->enum('slider_text', array('1','0'))->default('0');
			$table->string('title_1')->nullable();
			$table->string('title_2')->nullable();
			$table->string('banner_link')->nullable();
			$table->integer('position')->default(1);
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
		Schema::drop('sliders');
	}

}

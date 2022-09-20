<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_config', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('store_name')->default('BIZTRIA');
			$table->string('currency', 25)->default('&#8377;');
			$table->string('footer_text', 100)->default('Design & Developed By Biztria-Cregsta');
			$table->text('logo');
			$table->text('fevicon');
			$table->string('mobile')->default('+91 8866174302');
			$table->text('facebook')->nullable();
			$table->text('twitter')->nullable();
			$table->text('instagram')->nullable();
			$table->text('skype')->nullable();
			$table->text('pinterest')->nullable();
			$table->string('email', 50);
			$table->string('location', 25)->default('India');
			$table->text('address')->nullable();
			$table->text('address_2')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->text('additional_css')->nullable();
			$table->text('additional_js')->nullable();
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
		Schema::drop('site_config');
	}

}

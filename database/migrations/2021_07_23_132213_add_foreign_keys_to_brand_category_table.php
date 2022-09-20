<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBrandCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('brand_category', function(Blueprint $table)
		{
			$table->foreign('brand_id')->references('id')->on('brands')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('brand_category', function(Blueprint $table)
		{
			$table->dropForeign('brand_category_brand_id_foreign');
			$table->dropForeign('brand_category_category_id_foreign');
		});
	}

}

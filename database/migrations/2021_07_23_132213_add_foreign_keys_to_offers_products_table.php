<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOffersProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('offers_products', function(Blueprint $table)
		{
			$table->foreign('offers_id', 'offers_products_ibfk_1')->references('id')->on('offers')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('product_id', 'offers_products_ibfk_2')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('offers_products', function(Blueprint $table)
		{
			$table->dropForeign('offers_products_ibfk_1');
			$table->dropForeign('offers_products_ibfk_2');
		});
	}

}

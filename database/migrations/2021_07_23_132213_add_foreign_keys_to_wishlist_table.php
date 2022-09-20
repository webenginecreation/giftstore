<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWishlistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wishlist', function(Blueprint $table)
		{
			$table->foreign('user_id', 'wishlist_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('product_id', 'wishlist_ibfk_2')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wishlist', function(Blueprint $table)
		{
			$table->dropForeign('wishlist_ibfk_1');
			$table->dropForeign('wishlist_ibfk_2');
		});
	}

}

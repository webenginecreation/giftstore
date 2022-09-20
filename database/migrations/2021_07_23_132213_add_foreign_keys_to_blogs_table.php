<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('blogs', function(Blueprint $table)
		{
			$table->foreign('blog_category_id')->references('id')->on('blog_category')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('blog_category_id', 'blogs_ibfk_1')->references('id')->on('blog_category')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('blogs', function(Blueprint $table)
		{
			$table->dropForeign('blogs_blog_category_id_foreign');
			$table->dropForeign('blogs_ibfk_1');
		});
	}

}

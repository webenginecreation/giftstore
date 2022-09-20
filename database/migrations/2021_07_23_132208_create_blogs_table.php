<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('blog_category_id')->unsigned()->index('blog_category_id');
			$table->string('blog_title', 55);
			$table->string('blog_slug', 100);
			$table->text('blog_images');
			$table->text('blog_video_link')->nullable();
			$table->longtext('blog_details');
			$table->enum('status', array('0','1'))->default('1');
			$table->timestamps();
			$table->string('meta_title')->nullable();
			$table->string('meta_description')->nullable();
			$table->string('meta_keyword')->nullable();
			$table->string('meta_author')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blogs');
	}

}

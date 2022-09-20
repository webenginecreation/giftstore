<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('category_id')->unsigned()->index('category_id');
			$table->bigInteger('brand_id')->nullable()->index('products_brand_id_foreign');
			$table->string('name');
			$table->string('slug');
			$table->string('images');
			$table->text('images1')->nullable();
			$table->text('images2')->nullable();
			$table->text('images3')->nullable();
			$table->text('images4')->nullable();
			$table->string('discount_price');
			$table->text('wholeseller_price')->nullable();
			$table->text('reseller_price')->nullable();
			$table->string('size')->nullable();
			$table->longtext('details');
			$table->integer('CGST')->nullable();
			$table->integer('SGST')->nullable();
			$table->integer('base_price');
			$table->longtext('Short_details');
			$table->string('sku')->nullable();
			$table->string('product_link')->nullable();
			$table->enum('stock_status', array('1','0'))->default('1');
			$table->enum('status', array('0','1'));
			$table->timestamps();
			$table->string('meta_title')->nullable();
			$table->string('meta_description')->nullable();
			$table->string('meta_keyword')->nullable();
			$table->string('meta_author')->nullable();
			$table->integer('stock_amount')->nullable();
			$table->integer('low_stock_alert')->nullable();
			$table->string('notify_stock')->nullable();
			$table->string('weight')->nullable();
			$table->string('length')->nullable();
			$table->string('width')->nullable();
			$table->string('height')->nullable();
			$table->string('affiliate_carrier')->nullable();
			$table->longtext('specification')->nullable();
			$table->longtext('additional_info')->nullable();
			$table->string('youtube_url')->nullable();
			$table->text('share_link')->nullable();
			$table->longtext('tags')->nullable();
			$table->enum('images_allowed', array('No','Yes'))->default('No');
			$table->enum('text_allowed', array('No','Yes'))->default('No');
			$table->integer('shipping_charges');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}

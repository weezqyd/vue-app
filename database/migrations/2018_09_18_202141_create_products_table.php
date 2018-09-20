<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductsTable.
 */
class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('product_code')->nullable();
			$table->integer('supplier_id', false, true)->nullable();
			$table->timestamps();

			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
		});

		Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
			$table->string('order_code')->nullable();
			$table->integer('headquater_id', false, true)->nullable();
			$table->timestamps();
			
			$table->foreign('headquater_id')->references('id')->on('headquaters')->onDelete('set null');
		});

		Schema::create('order_items', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('quantity')->nullable();
			$table->integer('order_id', false, true)->nullable();
			$table->integer('product_id', false, true)->nullable();
			$table->timestamps();
			
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
		});

		Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamp('delivery_date')->nullable();
			$table->integer('supplier_id', false, true)->nullable();
			$table->timestamps();
			
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
		});
		Schema::create('order_deliveries', function (Blueprint $table) {
            $table->increments('id');			$table->timestamp('delived_date')->nullable();
			$table->integer('order_id', false, true)->nullable();
			$table->integer('delivery_id', false, true)->nullable();
			$table->timestamps();
			
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('order_deliveries');
		Schema::dropIfExists('deliveries');
		Schema::dropIfExists('order_items');
		Schema::dropIfExists('orders');
		Schema::dropIfExists('products');
	}
}

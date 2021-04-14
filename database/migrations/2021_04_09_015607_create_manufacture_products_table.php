<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufactureProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacture_products', function (Blueprint $table) {
            $table->id();
            $table->json('category_id');
            $table->string('model_number')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->float('regular_price')->nullable();
            $table->float('group_price_one')->nullable();
            $table->float('group_price_two')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('discount_type')->default(0);   // % or Rs
            $table->boolean('in_stock')->default(0)->nullable();
            $table->integer('qty')->nullable()->nullable();
            $table->integer('on_sale')->default(0)->nullable();
            $table->integer('product_type')->default(0);  // is_feature, hot, new
            $table->json('attributes')->nullable();
            $table->json('gallery_image')->nullable();  // give the option to choose which one is main image
            $table->string('role_id')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('rank')->default(0);
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
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
        Schema::dropIfExists('manufacture_products');
    }
}

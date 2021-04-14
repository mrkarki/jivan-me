<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
             $table->integer('sku')->nullable();
            //$table->autoIncrementing('sku')->start_from(00);
            $table->string('model')->nullable();
            $table->json('category_id');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('price_break_down')->nullable();
            $table->json('tag_id')->nullable();
            $table->float('regular_price')->nullable();
            $table->float('sale_price')->nullable();
            $table->float('group_price_one')->nullable();
            $table->float('group_price_two')->nullable();
            $table->float('regular_wholesale_price')->nullable();
            $table->float('sale_wholesale_price')->nullable();
            $table->float('wholesaller_group_price_one')->nullable();
            $table->float('wholesaller_group_price_two')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('in_stock')->default(0)->nullable();
            $table->integer('stock_qty')->nullable()->nullable();
            $table->integer('on_sale')->default(0)->nullable();
            $table->integer('hot')->default(0)->nullable();
            $table->integer('is_featured')->default(0)->nullable();
            $table->json('attributes')->nullable();
            $table->json('brand')->nullable();
            $table->string('main_image')->nullable();
            $table->json('gallery_image')->nullable();
            $table->string('user_role')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keyword')->nullable();
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
        Schema::dropIfExists('products');
    }
}

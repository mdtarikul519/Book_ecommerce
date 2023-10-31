<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 200)->nullable();
            $table->string('product_url', 200)->nullable();
            $table->enum('is_top_product',['1','0'])->default('1');
            $table->text('selected_categories')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->float('discount')->nullable();
            $table->string('image', 200)->nullable();
            $table->float('cost')->nullable();
            $table->float('sales_price')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('low_stock')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('schema_tag')->nullable();
            $table->text('video_url')->nullable();


            $table->tinyInteger('creator')->nullable();
            $table->string('slug',50)->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

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
            $table->integer('cat_id');
            $table->integer('subcat_id');
            $table->integer('brand_id');
            $table->integer('unit_id');
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('model')->unique();
            $table->integer('stock_amount')->default(0);
            $table->integer('regular_price')->default(0);
            $table->integer('selling_price')->default(0);
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('feature_image')->nullable();
            $table->integer('hit_count')->default(0);
            $table->integer('sales_count')->default(0);
            $table->tinyInteger('featured_status')->default(0);
            $table->tinyInteger('product_status')->default(1);
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

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
            $table->id('products_id');
            $table->string('slug')->unique();
            $table->string('product_name_vi');
            $table->string('product_name_en');
            $table->string('product_name_ko')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ko')->nullable();
            $table->text('image')->nullable();
            $table->text('image_description')->nullable();
            $table->unsignedBigInteger('products_category_id');
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

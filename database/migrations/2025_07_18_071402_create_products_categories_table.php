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
        Schema::create('products_categories', function (Blueprint $table) {
            $table->id('products_category_id');
            $table->string('slug')->unique();
            $table->string('category_name_vi');
            $table->string('category_name_en');
            $table->string('category_name_ko')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ko')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_categories');
    }
};

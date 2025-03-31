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
        Schema::create('employers', function (Blueprint $table) {
            $table->id('employer_id');
            // $table->unsignedBigInteger('user_id');
            $table->string('company_name');
            $table->string('logo')->nullable();
            $table->string('background_img')->nullable();
            $table->text('company_description')->nullable();
            $table->string('website')->nullable();
            $table->string('contact_phone');
            $table->text('address');
            $table->string('email', 50)->nullable();
            $table->date('founded_at')->nullable();
            $table->string('about', 1000)->nullable();
            $table->string('company_type', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};

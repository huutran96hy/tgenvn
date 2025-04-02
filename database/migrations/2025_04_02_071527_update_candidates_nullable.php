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
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('full_name')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->text('address')->nullable()->change();
            $table->string('resume')->nullable(false)->change();
            $table->text('education')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('full_name')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->text('address')->nullable(false)->change();
            $table->string('resume')->nullable(false)->change();
            $table->text('education')->nullable(false)->change();
        });
    }
};

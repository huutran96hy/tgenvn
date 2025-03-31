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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_title');
            $table->text('job_description');
            $table->text('requirements');
            $table->string('salary')->nullable();
            $table->string('location');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('employer_id');
            $table->date('posted_date');
            $table->date('expiry_date');
            $table->string('required_education', 50)->nullable();
            $table->string('required_exp', 30)->nullable();
            $table->string('job_type', 20)->default('fulltime'); // Full-time, Part-time, Freelance, ...
            $table->string('approval_status')->default('pending'); // approved , rejected, pending
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

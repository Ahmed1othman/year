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
        Schema::create('academic_degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_year_id')->nullable()->references('id')->on('academic_years');
            $table->foreignId('academic_gender_id')->nullable()->references('id')->on('academic_genders');
            $table->foreignId('academic_branch_id')->nullable()->references('id')->on('academic_branches');
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->date('degree_start_date')->nullable();
            $table->date('degree_end_date')->nullable();
            $table->string('degree_hijri_start_date')->nullable();
            $table->string('degree_hijri_end_date')->nullable();
            $table->date('degree_active_date')->nullable();
            $table->date('degree_successful_transfer_date')->nullable();
            $table->boolean('is_open_for_admission')->default(0);
            $table->boolean('active')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_degrees');
    }
};

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
        Schema::create('academic_semesters', function (Blueprint $table) {
            $table->id();
            $table->string('semester_name')->nullable();
            $table->string('semester_name_noor')->nullable();
            $table->string('semester_name_latin')->nullable();
            $table->foreignId('academic_year_id')->nullable()->references('id')->on('academic_years');
            $table->foreignId('academic_degree_id')->nullable()->references('id')->on('academic_branches');
            $table->date('semester_successful_transfer_date')->nullable();
            $table->date('semester_start_date')->nullable();
            $table->date('semester_end_date')->nullable();
            $table->string('semester_hijri_start_date')->nullable();
            $table->string('semester_hijri_end_date')->nullable();
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
        Schema::dropIfExists('academic_semesters');
    }
};

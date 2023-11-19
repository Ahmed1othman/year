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
        Schema::create('academic_years', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year_code')->nullable();
            $table->string('academic_year_name')->nullable();
            $table->string('academic_year_name_latin')->nullable();
            $table->string('academic_year_description')->nullable();
            $table->string('academic_year_description_latin')->nullable();
            $table->string('academic_year_hijri_name')->nullable();
            $table->foreignId('school_hub_id')->nullable()->references('id')->on('school_hubs');
            $table->foreignId('school_id')->nullable()->references('id')->on('schools');
            $table->foreignId('previous_year_id')->nullable()->references('id')->on('academic_years');
            $table->date('academic_year_start_date')->nullable();
            $table->date('academic_year_end_date')->nullable();
            $table->string('academic_year_hijri_start_date')->nullable();
            $table->string('academic_year_hijri_end_date')->nullable();
            $table->date('academic_year_active_date')->nullable();
            $table->date('admission_date')->nullable();
            $table->boolean('is_open_for_admission')->default(0);
            $table->boolean('current_academic_year')->default(0);
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
        Schema::dropIfExists('academic_years');
    }
};

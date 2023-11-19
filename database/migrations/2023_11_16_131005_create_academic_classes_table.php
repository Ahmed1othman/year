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
        Schema::create('academic_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_code')->nullable();
            $table->string('class_name')->nullable();
            $table->string('class_name_noor')->nullable();
            $table->string('class_name_latin')->nullable();
            $table->string('class_description')->nullable();
            $table->string('class_description_latin')->nullable();
            $table->foreignId('academic_year_id')->nullable()->references('id')->on('academic_years');
            $table->foreignId('academic_degree_id')->nullable()->references('id')->on('academic_branches');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->date('class_active_date')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('max_capacity')->default(1);
            $table->integer('min_capacity')->default(0);
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
        Schema::dropIfExists('academic_classes');
    }
};

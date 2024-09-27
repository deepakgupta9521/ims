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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->string('title');  // Title of the internship
            $table->string('company_name');  // Company Name
            $table->text('short_description');  // Short Description
            $table->date('deadline');  // Application Deadline
            $table->string('location');  // Location of the job
            $table->enum('work_type', ['Remote', 'Onsite']);  // Remote or Onsite
            $table->enum('job_type', ['Full Time', 'Part Time']);  // Full Time or Part Time
            $table->string('duration');  // Duration of the internship
            $table->string('salary')->nullable();  // Salary (nullable if not specified)
            $table->text('job_description');  // Detailed job description
            $table->text('responsibilities');  // Candidate responsibilities in bullet points
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};

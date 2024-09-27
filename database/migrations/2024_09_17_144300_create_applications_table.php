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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('internship_id'); // Unsigned big integer for foreign key
            $table->unsignedBigInteger('user_id');       // Unsigned big integer for foreign key
            $table->string('cv');  // To store the CV file path
            $table->timestamps();

            // Set foreign key constraints
            $table->foreign('internship_id')->references('id')->on('internships')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

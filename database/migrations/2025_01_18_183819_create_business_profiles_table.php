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
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index(); // Link to users table
            $table->string('name'); // Business name
            $table->text('description')->nullable(); // Business description
            $table->string('contact_email')->nullable(); // Contact email
            $table->string('contact_phone')->nullable(); // Contact phone
            $table->string('logo')->nullable(); // Path to logo image
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_profiles');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2)->nullable(); // Optional price field
            $table->boolean('availability')->default(true);
            $table->json('photos')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User relationship
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Category relationship
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }

};

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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Book title
            $table->string('author'); // Author's name
            $table->text('description')->nullable(); // Description of the book
            $table->integer('rating')->default(0); // Average rating, default is 0
            $table->string('book_front_img')->nullable(); // Front image of the book
            $table->string('book_back_img')->nullable(); // Back image of the book
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

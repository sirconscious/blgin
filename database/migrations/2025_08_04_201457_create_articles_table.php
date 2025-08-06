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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); // Title of the article
            $table->longText('content'); // Content of the article
            $table->unsignedBigInteger('user_id'); // Author of the article 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint 
            $table->softDeletes(); // Soft delete column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

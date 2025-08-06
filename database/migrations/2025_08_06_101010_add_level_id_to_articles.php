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
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id')->nullable()->after('user_id'); // Adding level_id column
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null'); // Foreign key constraint

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['level_id']); // Drop foreign key constraint
            $table->dropColumn('level_id'); // Drop level_id column
        });
    }
};

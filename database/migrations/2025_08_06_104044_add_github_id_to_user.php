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
        Schema::table('users', function (Blueprint $table) {
            $table->string('github_id')->nullable()->after('email'); // Adding github_id column
            $table->string('github_username')->nullable()->after('github_id'); // Adding github_username column
            $table->string('github_avatar_url')->nullable()->after('github_username'); // Adding github_avatar_url column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn(['github_id', 'github_username', 'github_avatar_url']); // Drop the columns
            // Note: No foreign key constraints to drop since these are simple string columns   
        });
    }
};

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
        Schema::table('aspirations', function (Blueprint $table) {
            $table->text('response')->nullable()->after('message');
            $table->boolean('is_visible')->default(false)->after('status');
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspirations', function (Blueprint $table) {
            $table->dropColumn(['response', 'is_visible']);
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
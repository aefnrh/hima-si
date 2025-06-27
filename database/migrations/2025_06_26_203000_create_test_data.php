<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create a test division
        $divisionId = DB::table('divisions')->insertGetId([
            'name' => 'Test Division',
            'slug' => 'test-division-' . time(),
            'description' => 'This is a test division for demonstration purposes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Create a test event associated with the division
        DB::table('events')->insert([
            'title' => 'Test Event',
            'slug' => 'test-event-' . time(),
            'description' => 'This is a test event associated with the Test Division',
            'date' => now(),
            'location' => 'Test Location',
            'division_id' => $divisionId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('events')->where('slug', 'like', 'test-event-%')->delete();
        DB::table('divisions')->where('slug', 'like', 'test-division-%')->delete();
    }
};
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
        // Cek dan tambahkan Divisi Penelitian dan Pengembangan jika belum ada
        if (!DB::table('divisions')->where('name', 'like', '%Penelitian dan Pengembangan%')->exists() && 
            !DB::table('divisions')->where('name', 'like', '%LITBANG%')->exists()) {
            
            DB::table('divisions')->insert([
                'name' => 'Divisi Penelitian dan Pengembangan',
                'slug' => 'litbang',
                'description' => 'Divisi yang bertanggung jawab untuk penelitian dan pengembangan teknologi informasi.',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
        // Cek dan tambahkan Divisi Keorganisasian jika belum ada
        if (!DB::table('divisions')->where('name', 'like', '%Keorganisasian%')->exists()) {
            
            DB::table('divisions')->insert([
                'name' => 'Divisi Keorganisasian',
                'slug' => 'keorganisasian',
                'description' => 'Divisi yang bertanggung jawab untuk keorganisasian dan administrasi himpunan.',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
        // Cek dan tambahkan Divisi Media Teknologi dan Informasi jika belum ada
        if (!DB::table('divisions')->where('name', 'like', '%Media Teknologi%')->exists() && 
            !DB::table('divisions')->where('name', 'like', '%MEDTEK%')->exists()) {
            
            DB::table('divisions')->insert([
                'name' => 'Divisi Media Teknologi dan Informasi',
                'slug' => 'medtek',
                'description' => 'Divisi yang bertanggung jawab untuk media, teknologi, dan informasi himpunan.',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak perlu menghapus divisi yang sudah dibuat
    }
};

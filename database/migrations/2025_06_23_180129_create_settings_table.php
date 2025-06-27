<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('setting_key', 50)->unique();
            $table->text('setting_value');
            $table->timestamps();
        });
        }

        // Insert default settings
        $settings = [
            ['site_name', 'HIMA SI - Himpunan Mahasiswa Sistem Informasi'],
            ['site_description', 'Website resmi Himpunan Mahasiswa Sistem Informasi'],
            ['instagram', 'himasi_official'],
            ['whatsapp', '+6281234567890'],
            ['email', 'himasi@example.com'],
            ['address', 'Universitas Kuningan, Jl. Cut Nyak Dhien No.36A, Cijoho, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45513'],
            ['sikyute_instagram', 'sikyute_official']
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->insert([
                'setting_key' => $setting[0],
                'setting_value' => $setting[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

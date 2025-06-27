<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['setting_key' => 'email', 'setting_value' => 'himas.si.fkom@uniku.ac.id'],
            ['setting_key' => 'phone', 'setting_value' => '+62 811 2233 4455'],
            ['setting_key' => 'address', 'setting_value' => 'Jl. Pramuka No.67, Purwawinangun, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45512'],
            ['setting_key' => 'instagram', 'setting_value' => 'https://www.instagram.com/himsiunair'],
            ['setting_key' => 'twitter', 'setting_value' => 'https://twitter.com/himsiunair'],
            ['setting_key' => 'facebook', 'setting_value' => 'https://www.facebook.com/himsiunair'],
            ['setting_key' => 'youtube', 'setting_value' => 'https://www.youtube.com/himsiunair'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['setting_key' => $setting['setting_key']],
                ['setting_value' => $setting['setting_value']]
            );
        }
    }
}

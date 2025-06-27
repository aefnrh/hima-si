<?php

namespace Database\Seeders;

use App\Models\Kabinet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KabinetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kabinets = [
            [
                'name' => 'Kabinet Transformasi',
                'year' => '2023',
                'description' => 'Kabinet Transformasi HIMSI Unair periode 2023-2024',
                'vision' => 'Menjadikan HIMSI sebagai wadah transformasi mahasiswa Sistem Informasi yang adaptif dan inovatif',
                'mission' => "1. Mengoptimalkan fungsi HIMSI sebagai wadah aspirasi mahasiswa Sistem Informasi\n2. Meningkatkan kualitas dan kuantitas program kerja HIMSI\n3. Memperluas jaringan kerjasama dengan pihak eksternal",
                'image' => null,
            ],
        ];

        foreach ($kabinets as $kabinet) {
            Kabinet::updateOrCreate(
                ['name' => $kabinet['name']],
                [
                    'slug' => Str::slug($kabinet['name']),
                    'year' => $kabinet['year'],
                    'description' => $kabinet['description'],
                    'vision' => $kabinet['vision'],
                    'mission' => $kabinet['mission'],
                    'image' => $kabinet['image'],
                ]
            );
        }
    }
}
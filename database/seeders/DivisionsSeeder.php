<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            [
                'name' => 'Pengembangan Sumber Daya Manusia',
                'description' => 'Divisi yang bertanggung jawab untuk pengembangan kemampuan dan keterampilan anggota HIMSI.',
                'image' => null,
            ],
            [
                'name' => 'Hubungan Masyarakat',
                'description' => 'Divisi yang bertanggung jawab untuk menjalin hubungan dengan pihak eksternal dan mempromosikan kegiatan HIMSI.',
                'image' => null,
            ],
            [
                'name' => 'Penelitian dan Pengembangan',
                'description' => 'Divisi yang bertanggung jawab untuk melakukan penelitian dan pengembangan di bidang sistem informasi.',
                'image' => null,
            ],
            [
                'name' => 'Acara',
                'description' => 'Divisi yang bertanggung jawab untuk merencanakan dan melaksanakan acara-acara HIMSI.',
                'image' => null,
            ],
        ];

        foreach ($divisions as $division) {
            Division::updateOrCreate(
                ['name' => $division['name']],
                [
                    'slug' => Str::slug($division['name']),
                    'description' => $division['description'],
                    'image' => $division['image'],
                ]
            );
        }
    }
}
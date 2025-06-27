<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = [
            [
                'name' => 'Bahasa Inggris',
                'description' => 'Klub Bahasa Inggris adalah komunitas untuk mahasiswa yang ingin meningkatkan kemampuan berbahasa Inggris melalui berbagai kegiatan seperti diskusi, presentasi, dan debat dalam bahasa Inggris.',
                'image' => null,
            ],
            [
                'name' => 'UI/UX',
                'description' => 'Klub UI/UX adalah komunitas yang berfokus pada pengembangan keterampilan desain antarmuka pengguna dan pengalaman pengguna. Anggota akan belajar tentang prinsip-prinsip desain, wireframing, prototyping, dan user testing.',
                'image' => null,
            ],
            [
                'name' => 'Bisnis',
                'description' => 'Klub Bisnis adalah komunitas untuk mahasiswa yang tertarik dengan kewirausahaan dan manajemen bisnis. Anggota akan belajar tentang perencanaan bisnis, pemasaran, keuangan, dan leadership.',
                'image' => null,
            ],
            [
                'name' => 'Data Sains dan Pemrograman',
                'description' => 'Klub Data Sains dan Pemrograman adalah komunitas untuk mahasiswa yang tertarik dengan analisis data, machine learning, dan pengembangan perangkat lunak. Anggota akan belajar berbagai bahasa pemrograman dan teknik analisis data.',
                'image' => null,
            ],
            [
                'name' => 'Futsal',
                'description' => 'Klub Futsal adalah komunitas untuk mahasiswa yang gemar bermain futsal. Anggota akan berlatih bersama dan mengikuti berbagai kompetisi futsal antar universitas.',
                'image' => null,
            ],
            [
                'name' => 'Karya Tulis Ilmiah',
                'description' => 'Klub Karya Tulis Ilmiah adalah komunitas untuk mahasiswa yang tertarik dengan penelitian dan penulisan karya ilmiah. Anggota akan belajar tentang metodologi penelitian, penulisan akademik, dan publikasi ilmiah.',
                'image' => null,
            ],
            [
                'name' => 'Band',
                'description' => 'Klub Band adalah komunitas untuk mahasiswa yang memiliki minat dan bakat dalam bermusik. Anggota akan berlatih bersama dan tampil dalam berbagai acara kampus.',
                'image' => null,
            ],
            [
                'name' => 'Konten Kreator',
                'description' => 'Klub Konten Kreator adalah komunitas untuk mahasiswa yang tertarik dengan pembuatan konten digital seperti video, podcast, blog, dan media sosial. Anggota akan belajar tentang storytelling, editing, dan strategi pemasaran konten.',
                'image' => null,
            ],
        ];

        foreach ($clubs as $club) {
            Club::create([
                'name' => $club['name'],
                'slug' => Str::slug($club['name']),
                'description' => $club['description'],
                'image' => $club['image'],
            ]);
        }
    }
}
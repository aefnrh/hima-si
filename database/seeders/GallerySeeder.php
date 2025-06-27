<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan direktori gallery ada
        $galleryPath = public_path('images/gallery');
        if (!File::exists($galleryPath)) {
            File::makeDirectory($galleryPath, 0755, true);
        }

        // Data galeri
        $galleries = [
            [
                'title' => 'Workshop Pemrograman Web',
                'description' => 'Workshop pemrograman web dengan Laravel dan Vue.js yang diselenggarakan oleh HIMA SI.',
                'category' => 'Workshop',
                'event_date' => '2023-03-15',
                'image' => 'workshop-web.svg',
            ],
            [
                'title' => 'Seminar Teknologi Blockchain',
                'description' => 'Seminar tentang teknologi blockchain dan implementasinya dalam industri keuangan.',
                'category' => 'Seminar',
                'event_date' => '2023-04-20',
                'image' => 'seminar-blockchain.svg',
            ],
            [
                'title' => 'Kompetisi Hackathon',
                'description' => 'Kompetisi hackathon dengan tema Smart City yang diikuti oleh mahasiswa dari berbagai universitas.',
                'category' => 'Kompetisi',
                'event_date' => '2023-05-10',
                'image' => 'hackathon.svg',
            ],
            [
                'title' => 'Bakti Sosial di Panti Asuhan',
                'description' => 'Kegiatan bakti sosial yang dilakukan oleh anggota HIMA SI di Panti Asuhan Kasih Bunda.',
                'category' => 'Bakti Sosial',
                'event_date' => '2023-06-05',
                'image' => 'baksos.svg',
            ],
            [
                'title' => 'Kunjungan Industri ke Google Indonesia',
                'description' => 'Kunjungan industri ke kantor Google Indonesia untuk mempelajari teknologi dan budaya kerja di perusahaan teknologi global.',
                'category' => 'Kunjungan',
                'event_date' => '2023-07-15',
                'image' => 'kunjungan-google.svg',
            ],
            [
                'title' => 'Pelatihan Data Science',
                'description' => 'Pelatihan data science dan machine learning menggunakan Python dan TensorFlow.',
                'category' => 'Workshop',
                'event_date' => '2023-08-20',
                'image' => 'data-science.svg',
            ],
        ];

        // Buat SVG placeholder untuk setiap galeri
        foreach ($galleries as $gallery) {
            // Buat SVG placeholder
            $svgContent = $this->generateSvgPlaceholder($gallery['title']);
            File::put($galleryPath . '/' . $gallery['image'], $svgContent);

            // Simpan data galeri ke database
            Gallery::create($gallery);
        }
    }

    /**
     * Generate SVG placeholder dengan teks
     */
    private function generateSvgPlaceholder(string $text): string
    {
        // Warna acak untuk background
        $colors = ['#3498db', '#2ecc71', '#e74c3c', '#f39c12', '#9b59b6', '#1abc9c'];
        $bgColor = $colors[array_rand($colors)];

        // Buat SVG dengan teks di tengah
        return <<<SVG
<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg">
    <rect width="100%" height="100%" fill="$bgColor"/>
    <text x="50%" y="50%" font-family="Arial, sans-serif" font-size="24" fill="white" text-anchor="middle" dominant-baseline="middle">{$text}</text>
</svg>
SVG;
    }
}
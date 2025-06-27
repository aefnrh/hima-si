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
        // Divisi Penelitian dan Pengembangan (LITBANG)
        $litbangDivision = DB::table('divisions')->where('name', 'like', '%Penelitian dan Pengembangan%')->orWhere('name', 'like', '%LITBANG%')->first();
        
        if ($litbangDivision) {
            $workPrograms = [
                [
                    'name' => 'Study Club',
                    'time' => '08, 15 November 2025',
                    'description' => 'Sebuah forum mahasiswa yang berfokus pada pengembangan pengetahuan dan keterampilan di bidang teknologi, sekaligus membangun karakter kepemimpinan dan kerja sama tim. Forum ini menjadi wadah bagi mahasiswa untuk belajar, berdiskusi, serta berbagi wawasan guna meningkatkan kemampuan soft skill dan hard skill.',
                    'target' => 'Mahasiswa Baru Program Studi Sistem Informasi',
                    'goals' => 'Membantu mahasiswa baru mengembangkan pengetahuan di bidang teknologi. Melatih komunikasi, kerja sama tim, dan kemampuan menyampaikan pendapat. Melatih kemampuan kepemimpinan mahasiswa. Mempererat hubungan antar mahasiswa.',
                    'budget' => 'Rp. 13.000.000,00',
                    'leader' => 'Muhamad Hasbi Habiburrohman'
                ],
                [
                    'name' => 'Belajar Bareng Mahasiswa (BBM)',
                    'time' => 'Minggu ke 4 bulan Oktober',
                    'description' => 'Media untuk membuka wawasan mahasiswa, khususnya di dunia teknologi. Dengan adanya Forum Grup Diskusi (FGD) yang membahas berbagai topik terkait teknologi, mahasiswa dapat lebih mendalami dan memahami perkembangan di bidang tersebut.',
                    'target' => 'Mahasiswa Baru Program Studi Sistem Informasi',
                    'goals' => 'Membantu mahasiswa dalam memahami materi perkuliahan dan mengatasi kesulitan belajar, serta Memberikan pemahaman yang lebih luas tentang perkembangan teknologi kepada mahasiswa',
                    'budget' => 'Rp. 100.000,00',
                    'leader' => 'Clarissa Nasywa Harviani & Yasmin Seira Mauludina'
                ],
                [
                    'name' => 'Webinar/Seminar',
                    'time' => '20 Mei 2025',
                    'description' => 'Webinar ini dirancang khusus untuk pemula yang ingin memulai karir di bidang web development. Dalam webinar ini, kita akan membahas tentang konsep-konsep dasar web development, mulai dari dasar-dasar HTML, CSS, dan JavaScript, hingga cara membuat aplikasi web yang dinamis dan interaktif.',
                    'target' => 'Mahasiswa FKOM UNIKU dan peminat web development',
                    'goals' => 'Memberikan pemahaman dasar tentang web development kepada pemula, mulai dari dasar-dasar HTML, CSS, dan JavaScript. Membantu pemula memahami cara membuat aplikasi web sederhana dan dinamis menggunakan teknologi web development. Mempersiapkan pemula untuk menjadi web developer yang handal dan Memberikan pengetahuan tentang cara membuat aplikasi web yang dinamis dan interaktif',
                    'budget' => 'Rp. 900.000,00',
                    'leader' => 'Dea Puspitasari'
                ],
                [
                    'name' => 'Aspirasi & Kesejahtteraan Mahasiswa (ASKESMA)',
                    'time' => 'Fleksibel',
                    'description' => 'Pertemuan dengan mahasiswa Sistam Informasi untuk menyalurkan, menyampaikan, dan menampung aspirasi mahasiswa Prodi Sistem Informasi. Dengan adanya juga konsep G form. Serta Konsolidasi tingkat Angkatan yang akan membahas terkait persiapan kerja, dan skripsi buat tingkat atas. Serta feed tentang tips pengembangan diri.',
                    'target' => 'Mahasiswa sistem informasi angkatan 22, 23, dan 24',
                    'goals' => 'Menampung aspirasi mahasiswa Prodi Sistem Informasi dan membekali mereka dengan wawasan, pengalaman, serta keterampilan untuk menghadapi tantangan akademik dan profesional.',
                    'leader' => 'Wawang Azarki'
                ]
            ];
            
            DB::table('divisions')->where('id', $litbangDivision->id)->update([
                'work_programs' => json_encode($workPrograms)
            ]);
        }
        
        // Divisi Keorganisasian
        $keorganisasianDivision = DB::table('divisions')->where('name', 'like', '%Keorganisasian%')->first();
        
        if ($keorganisasianDivision) {
            $workPrograms = [
                [
                    'name' => 'Open Recruitment (Oprek)',
                    'time' => 'Minggu ke 2 bulan November',
                    'description' => 'Menyaring mahasiswa program studi sistem informasi yang memiliki niat dan tekad yang kuat untuk berdedikasi kepada HIMASI, memiliki rasa tanggung jawab yang tinggi, memiliki loyalitas terhadap himpunan, serta memiliki kompetensi yang sesuai dengan bidang yang dituju.',
                    'target' => 'Mahasiswa program studi Sistem Informasi angkatan 2024 dan 2025 (Mahasiswa Baru).',
                    'goals' => 'Meregenerasi kepengurusan HIMASI. Meningkatkan kualitas anggota HIMASI. Mendorong inovasi dan kreatifitas.',
                    'leader' => 'Moh. Rifqi Ulwanul \'Izza'
                ],
                [
                    'name' => 'Musyawarah Mahasiswa (Mumas)',
                    'description' => 'Pra MUMAS (Gambaran/Simulasi mengenai pelaksanaan MuMas meliputi pemilihan pimsid 1-3)',
                    'target' => 'Anggota HIMA SI dan Mahasiswa Sistem Informasi',
                    'goals' => 'Laporan Pertanggung Jawaban (LPJ), Pengesahan Anggaran Dasar dan Anggaran Rumah Tangga (ADART), serta, Pemilihan Ketua dan Wakil Ketua baru untuk periode selanjutnya.',
                    'budget' => 'Rp. 1.000.000',
                    'leader' => 'Dewi Sukma Nurhana'
                ],
                [
                    'name' => 'Upgrading',
                    'description' => 'Sharing Session yang akan menjadi wadah berbagi informasi dan edukasi serta mengembangkan komunikasi antar individu.',
                    'target' => 'Anggota HIMA SI',
                    'goals' => 'Meningkatkan komunikasi dan kerjasama untuk mencapai tujuan bersama, meningkatkan kualitas anggota, memperkuat kepercayaan, menyelesaikan konflik, meraih reputasi baik, dan meningkatkan motivasi kerja.',
                    'budget' => 'Rp. 100.000,00',
                    'leader' => 'Az Zahra Nadira'
                ],
                [
                    'name' => 'Bonding',
                    'description' => 'Bonding Session ini dirancang sebagai kegiatan untuk mempererat hubungan antar anggota, memberikan kesempatan untuk saling mengenal lebih dekat, serta meningkatkan kekompakan dan kekuatan tim dalam mencapai tujuan bersama.',
                    'target' => 'Anggota HIMA SI',
                    'goals' => 'Memperkuat hubungan interpersonal, menciptakan rasa kebersamaan, membangun kepercayaan, meningkatkan komunikasi, dan menciptakan suasana nyaman untuk meningkatkan kerjasama, semangat, dan motivasi dalam organisasi',
                    'budget' => 'Rp. 500.000,00',
                    'leader' => 'Salsabillah Aulia Az Zahra'
                ]
            ];
            
            DB::table('divisions')->where('id', $keorganisasianDivision->id)->update([
                'work_programs' => json_encode($workPrograms)
            ]);
        }
        
        // Divisi Media Teknologi dan Informasi (MEDTEK)
        $medtekDivision = DB::table('divisions')->where('name', 'like', '%Media Teknologi%')->orWhere('name', 'like', '%MEDTEK%')->first();
        
        if ($medtekDivision) {
            $workPrograms = [
                [
                    'name' => 'Video Profil',
                    'time' => 'Tidak ditentukan',
                    'description' => 'Pembuatan video profil himpunan mahasiswa sistem informasi sebagai perkenalan organisasi HIMA SI.',
                    'target' => 'Mahasiswa Umum dan Publikasi Media',
                    'goals' => 'Menghasilkan video profil HIMA SI yang menarik dan berkualitas supaya dapat dikenali oleh semua orang mengenai organisasi himpunan mahasiswa sistem informasi.',
                    'budget' => 'Rp. 300.000,00',
                    'leader' => 'Muhamad Ariel Nugroho'
                ],
                [
                    'name' => 'Podcast',
                    'time' => 'Tidak ditentukan',
                    'description' => 'Pembuatan video podcast sebagai media diskusi, edukasi, dan informasi terutama bagi mahasiswa Sistem Informasi. Bekerjasama dengan divisi Public Relation dan club Content Creator',
                    'target' => 'Mahasiswa Sistem Informasi',
                    'goals' => 'Menjadi wadah berbagi informasi, pengalaman, dan wawasan seputar perkuliahan dan dunia kerja',
                    'budget' => 'Tidak ditentukan',
                    'leader' => 'Febri Putra Pratama'
                ]
            ];
            
            DB::table('divisions')->where('id', $medtekDivision->id)->update([
                'work_programs' => json_encode($workPrograms)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reset work_programs to null for all divisions
        DB::table('divisions')->update([
            'work_programs' => null
        ]);
    }
};

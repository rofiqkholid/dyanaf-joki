<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks for truncate
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        // Clear existing data
        Service::truncate();
        ServiceCategory::truncate();

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // Category 1: Tugas Akademik
        $akademik = ServiceCategory::create([
            'name' => 'Tugas Akademik',
            'name_en' => 'Academic Tasks',
            'description' => 'Solusi cepat untuk tugas kuliah dan sekolah',
            'description_en' => 'Fast solutions for university and school assignments',
            'icon' => 'fas fa-book',
            'order' => 1,
        ]);

        Service::create([
            'category_id' => $akademik->id,
            'name' => 'Makalah (Tanpa Materi)',
            'name_en' => 'Paper (Without Material)',
            'slug' => 'makalah-tanpa-materi',
            'tag' => 'Tanpa Materi',
            'tag_en' => 'Without Material',
            'tag_color' => 'blue',
            'icon' => 'fas fa-file-alt',
            'thumbnail' => 'image/thumbnail/banner-makalah.webp',
            'estimation' => '2 Jam - 1 Hari',
            'estimation_en' => '2 Hours - 1 Day',
            'price' => 100000,
            'price_unit' => 'IDR',
            'route_name' => 'order.makalah-tanpa-materi',
            'order' => 1,
        ]);

        Service::create([
            'category_id' => $akademik->id,
            'name' => 'Makalah (Ada Materi)',
            'name_en' => 'Paper (With Material)',
            'slug' => 'makalah-ada-materi',
            'tag' => 'Ada Materi',
            'tag_en' => 'With Material',
            'tag_color' => 'green',
            'icon' => 'fas fa-book-open',
            'thumbnail' => 'image/thumbnail/banner-makalah.webp',
            'estimation' => '1 - 6 Jam',
            'estimation_en' => '1 - 6 Hours',
            'price' => 70000,
            'price_unit' => 'IDR',
            'route_name' => 'order.makalah-ada-materi',
            'order' => 2,
        ]);

        Service::create([
            'category_id' => $akademik->id,
            'name' => 'Jurnal',
            'name_en' => 'Journal',
            'slug' => 'jurnal',
            'tag' => 'Ilmiah/Akademik',
            'tag_en' => 'Scientific/Academic',
            'tag_color' => 'purple',
            'icon' => 'fas fa-newspaper',
            'thumbnail' => 'image/thumbnail/banner-jurnal.webp',
            'estimation' => '1 Hari',
            'estimation_en' => '1 Day',
            'price' => 130000,
            'price_unit' => 'IDR',
            'route_name' => 'order.jurnal',
            'order' => 3,
        ]);

        Service::create([
            'category_id' => $akademik->id,
            'name' => 'Joki Tugas',
            'name_en' => 'Assignment Assistance',
            'slug' => 'joki-tugas',
            'tag' => 'Tugas Harian',
            'tag_en' => 'Daily Homework',
            'tag_color' => 'orange',
            'icon' => 'fas fa-pencil-alt',
            'thumbnail' => 'image/thumbnail/banner-joki-tugas.webp',
            'estimation' => '3 Jam',
            'estimation_en' => '3 Hours',
            'price' => 50000,
            'price_unit' => '/tugas',
            'route_name' => 'order.joki-tugas',
            'order' => 4,
        ]);

        // Category 2: Kebutuhan Lamar Pekerjaan
        $lamar = ServiceCategory::create([
            'name' => 'Kebutuhan Lamar Pekerjaan',
            'name_en' => 'Job Application Needs',
            'description' => 'Tampil profesional dalam melamar pekerjaan',
            'description_en' => 'Look professional when applying for jobs',
            'icon' => 'fas fa-briefcase',
            'order' => 2,
        ]);

        Service::create([
            'category_id' => $lamar->id,
            'name' => 'CV Kreatif',
            'name_en' => 'Creative Resume',
            'slug' => 'cv-kreatif',
            'tag' => 'Desain Modern',
            'tag_en' => 'Modern Design',
            'tag_color' => 'pink',
            'icon' => 'fas fa-id-card',
            'thumbnail' => 'image/thumbnail/banner-cv.webp',
            'estimation' => '2 Jam',
            'estimation_en' => '2 Hours',
            'price' => 25000,
            'price_unit' => 'IDR',
            'route_name' => 'order.cv-kreatif',
            'order' => 1,
        ]);

        Service::create([
            'category_id' => $lamar->id,
            'name' => 'CV ATS',
            'name_en' => 'ATS Resume',
            'slug' => 'cv-ats',
            'tag' => 'Lolos Sistem ATS',
            'tag_en' => 'ATS Friendly',
            'tag_color' => 'indigo',
            'icon' => 'fas fa-shield-alt',
            'thumbnail' => 'image/thumbnail/banner-cv-ats.webp',
            'estimation' => '3 Jam',
            'estimation_en' => '3 Hours',
            'price' => 60000,
            'price_unit' => 'IDR',
            'route_name' => 'order.cv-ats',
            'order' => 2,
        ]);

        Service::create([
            'category_id' => $lamar->id,
            'name' => 'Surat Lamaran',
            'name_en' => 'Cover Letter',
            'slug' => 'surat-lamaran',
            'tag' => 'Profesional',
            'tag_en' => 'Professional',
            'tag_color' => 'teal',
            'icon' => 'fas fa-envelope-open-text',
            'thumbnail' => 'image/thumbnail/banner-lamaran.webp',
            'estimation' => '30 Menit',
            'estimation_en' => '30 Minutes',
            'price' => 20000,
            'price_unit' => 'IDR',
            'route_name' => 'order.surat-lamaran',
            'order' => 3,
        ]);

        Service::create([
            'category_id' => $lamar->id,
            'name' => 'Gabung PDF',
            'name_en' => 'Merge PDF',
            'slug' => 'gabung-pdf',
            'tag' => 'Merge Dokumen',
            'tag_en' => 'Document Merge',
            'tag_color' => 'red',
            'icon' => 'fas fa-file-pdf',
            'thumbnail' => 'image/thumbnail/banner-gabung-pdf.webp',
            'estimation' => '30 Menit',
            'estimation_en' => '30 Minutes',
            'price' => 10000,
            'price_unit' => 'IDR',
            'route_name' => 'order.gabung-pdf',
            'order' => 4,
        ]);

        // Category 3: Kebutuhan Bisnis
        $bisnis = ServiceCategory::create([
            'name' => 'Kebutuhan Perusahaan & Bisnis',
            'name_en' => 'Corporate & Business Needs',
            'description' => 'Layanan untuk mengembangkan bisnis Anda',
            'description_en' => 'Services to help grow your business',
            'icon' => 'fas fa-building',
            'order' => 3,
        ]);

        Service::create([
            'category_id' => $bisnis->id,
            'name' => 'Web Statis',
            'name_en' => 'Static Website',
            'slug' => 'web-statis',
            'tag' => 'Landing Page',
            'tag_en' => 'Landing Page',
            'tag_color' => 'cyan',
            'icon' => 'fas fa-laptop-code',
            'thumbnail' => 'image/thumbnail/banner-web-statis.webp',
            'estimation' => '5 Hari',
            'estimation_en' => '5 Days',
            'price' => 600000,
            'price_unit' => 'IDR',
            'route_name' => 'order.web-statis',
            'order' => 1,
        ]);

        Service::create([
            'category_id' => $bisnis->id,
            'name' => 'Web Dinamis',
            'name_en' => 'Dynamic Website',
            'slug' => 'web-dinamis',
            'tag' => 'Excl. Hosting',
            'tag_en' => 'Excl. Hosting',
            'tag_color' => 'purple',
            'icon' => 'fas fa-code',
            'thumbnail' => 'image/thumbnail/banner-web-dinamis.webp',
            'estimation' => '7 Hari',
            'estimation_en' => '7 Days',
            'price' => 1500000,
            'price_display' => '1.5JT',
            'price_unit' => 'IDR',
            'route_name' => 'order.web-dinamis',
            'order' => 2,
        ]);

        Service::create([
            'category_id' => $bisnis->id,
            'name' => 'Desain Grafis',
            'name_en' => 'Graphic Design',
            'slug' => 'desain-grafis',
            'tag' => 'Logo, Banner, dll',
            'tag_en' => 'Logo, Banner, etc.',
            'tag_color' => 'yellow',
            'icon' => 'fas fa-paint-brush',
            'thumbnail' => 'image/thumbnail/banner-desain-grafis.webp',
            'estimation' => '1 Hari',
            'estimation_en' => '1 Day',
            'price' => 100000,
            'price_unit' => 'IDR',
            'route_name' => 'order.desain-grafis',
            'order' => 3,
        ]);

        Service::create([
            'category_id' => $bisnis->id,
            'name' => 'Data Entry',
            'name_en' => 'Data Entry',
            'slug' => 'data-entry',
            'tag' => 'Input Data',
            'tag_en' => 'Data Input',
            'tag_color' => 'lime',
            'icon' => 'fas fa-keyboard',
            'thumbnail' => 'image/thumbnail/banner-data-entry.webp',
            'estimation' => '1 Hari',
            'estimation_en' => '1 Day',
            'price' => 150000,
            'price_unit' => 'IDR',
            'route_name' => 'order.data-entry',
            'order' => 4,
        ]);

        Service::create([
            'category_id' => $bisnis->id,
            'name' => 'Jasa Ketik Word',
            'name_en' => 'Word Typing Service',
            'slug' => 'jasa-ketik-word',
            'tag' => 'Proposal, Surat',
            'tag_en' => 'Proposal, Letter',
            'tag_color' => 'sky',
            'icon' => 'fab fa-microsoft',
            'thumbnail' => 'image/thumbnail/banner-ketik-word.webp',
            'estimation' => '6 Jam',
            'estimation_en' => '6 Hours',
            'price' => 100000,
            'price_unit' => 'IDR',
            'route_name' => 'order.jasa-ketik-word',
            'order' => 5,
        ]);

        Service::create([
            'category_id' => $bisnis->id,
            'name' => 'Jasa Excel',
            'name_en' => 'Excel Service',
            'slug' => 'jasa-excel',
            'tag' => 'Rumus, Tabel, dll',
            'tag_en' => 'Formula, Table, etc.',
            'tag_color' => 'emerald',
            'icon' => 'fas fa-file-excel',
            'thumbnail' => 'image/thumbnail/banner-ketik-exel.webp',
            'estimation' => '1 Hari',
            'estimation_en' => '1 Day',
            'price' => 130000,
            'price_unit' => 'IDR',
            'route_name' => 'order.jasa-excel',
            'order' => 6,
        ]);
    }
}

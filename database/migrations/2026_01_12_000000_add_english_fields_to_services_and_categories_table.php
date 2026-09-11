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
        Schema::table('service_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('service_categories', 'name_en')) {
                $table->string('name_en')->nullable()->after('name');
            }
            if (!Schema::hasColumn('service_categories', 'description_en')) {
                $table->string('description_en')->nullable()->after('description');
            }
        });

        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'name_en')) {
                $table->string('name_en')->nullable()->after('name');
            }
            if (!Schema::hasColumn('services', 'tag_en')) {
                $table->string('tag_en')->nullable()->after('tag');
            }
            if (!Schema::hasColumn('services', 'estimation_en')) {
                $table->string('estimation_en')->nullable()->after('estimation');
            }
        });

        // Seed English values into service_categories
        DB::table('service_categories')->where('id', 1)->update([
            'name_en' => 'Academic & College Assignments',
            'description_en' => 'Fast solutions for college and school assignments'
        ]);

        DB::table('service_categories')->where('id', 2)->update([
            'name_en' => 'Job Application Assets',
            'description_en' => 'Look professional when applying for jobs'
        ]);

        DB::table('service_categories')->where('id', 3)->update([
            'name_en' => 'Company & Business Needs',
            'description_en' => 'Services to grow your business'
        ]);

        // Seed English values into services
        $translations = [
            'makalah-tanpa-materi' => [
                'name_en' => 'Paper (Without Materials)',
                'tag_en' => 'Without Materials',
                'estimation_en' => '2 Hours - 1 Day'
            ],
            'makalah-ada-materi' => [
                'name_en' => 'Paper (With Materials)',
                'tag_en' => 'With Materials',
                'estimation_en' => '1 - 6 Hours'
            ],
            'jurnal' => [
                'name_en' => 'Scientific Journal',
                'tag_en' => 'Scientific/Academic',
                'estimation_en' => '1 Day'
            ],
            'joki-tugas' => [
                'name_en' => 'Daily Assignment Assistance',
                'tag_en' => 'Daily Homework',
                'estimation_en' => '3 Hours'
            ],
            'cv-kreatif' => [
                'name_en' => 'Creative CV',
                'tag_en' => 'Modern Design',
                'estimation_en' => '2 Hours'
            ],
            'cv-ats' => [
                'name_en' => 'ATS-Friendly CV',
                'tag_en' => 'Pass ATS Screening',
                'estimation_en' => '3 Hours'
            ],
            'surat-lamaran' => [
                'name_en' => 'Job Cover Letter',
                'tag_en' => 'Professional',
                'estimation_en' => '30 Minutes'
            ],
            'gabung-pdf' => [
                'name_en' => 'Merge PDF',
                'tag_en' => 'Document Merge',
                'estimation_en' => '30 Minutes'
            ],
            'web-statis' => [
                'name_en' => 'Static / Portfolio Website',
                'tag_en' => 'Landing Page',
                'estimation_en' => '5 Days'
            ],
            'web-dinamis' => [
                'name_en' => 'Dynamic / Custom Web System',
                'tag_en' => 'Excl. Hosting',
                'estimation_en' => '7 Days'
            ],
            'desain-grafis' => [
                'name_en' => 'Graphic & Promo Design',
                'tag_en' => 'Logo, Banner, etc',
                'estimation_en' => '1 Day'
            ],
            'data-entry' => [
                'name_en' => 'Data Entry & Spreadsheet',
                'tag_en' => 'Data Input',
                'estimation_en' => '1 Day'
            ],
            'jasa-ketik-word' => [
                'name_en' => 'Word Document Typing',
                'tag_en' => 'Proposals, Letters',
                'estimation_en' => '6 Hours'
            ],
            'jasa-excel' => [
                'name_en' => 'Excel Formulas & Data',
                'tag_en' => 'Formulas, Tables, etc',
                'estimation_en' => '1 Day'
            ]
        ];

        foreach ($translations as $slug => $data) {
            DB::table('services')->where('slug', $slug)->update($data);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_categories', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'description_en']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'tag_en', 'estimation_en']);
        });
    }
};

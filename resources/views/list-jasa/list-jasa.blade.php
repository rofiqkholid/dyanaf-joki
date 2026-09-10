@extends('layouts.app')

@section('title', 'Daftar Harga Layanan')

@section('content')
<!-- Floating Neo Doodles Background (Khusus Halaman List Jasa) -->
<div id="bg-doodles" class="hidden xl:block pointer-events-none select-none absolute top-[140px] left-0 right-0 bottom-[120px] z-0 overflow-hidden">
    <!-- Left Side Doodles -->
    <div class="absolute top-[1%] left-3 2xl:left-8 animate-float-slow opacity-90">
        <div class="neo-box-doodle bg-[#ffdd44] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] -rotate-6 flex items-center gap-1">
            <span>⚡</span> E = mc²
        </div>
    </div>

    <div class="absolute top-[7%] left-4 2xl:left-10 animate-float-reverse opacity-90">
        <div class="neo-box-doodle bg-[#8be4d6] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] rotate-3 flex items-center gap-1">
            <span>🎬</span> ▶ PLAY
        </div>
    </div>

    <div class="absolute top-[13%] left-3 2xl:left-8 animate-float-slow opacity-90">
        <div class="neo-box-doodle bg-[#ff7f9d] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] -rotate-3 flex items-center gap-1">
            <span>🧪</span> H₂O
        </div>
    </div>

    <div class="absolute top-[20%] left-4 2xl:left-10 animate-float-reverse opacity-90">
        <svg class="w-14 h-14" viewBox="0 0 70 70" fill="none">
            <circle cx="35" cy="35" r="8" fill="#8be4d6" stroke="#1a1a1a" stroke-width="2.5"/>
            <ellipse cx="35" cy="35" rx="30" ry="10" fill="none" stroke="#1a1a1a" stroke-width="2" transform="rotate(30 35 35)"/>
            <ellipse cx="35" cy="35" rx="30" ry="10" fill="none" stroke="#1a1a1a" stroke-width="2" transform="rotate(-30 35 35)"/>
            <circle cx="20" cy="22" r="3" fill="#ff7f9d" stroke="#1a1a1a" stroke-width="1"/>
        </svg>
    </div>

    <div class="absolute top-[26%] left-3 2xl:left-8 animate-float-slow opacity-90">
        <div class="neo-box-doodle bg-[#c084fc] px-3.5 py-1.5 font-mono font-black text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] rotate-6 flex items-center gap-1">
            <span>💻</span> &lt;/&gt;
        </div>
    </div>

    <div class="absolute top-[33%] left-4 2xl:left-10 animate-float-reverse opacity-90">
        <div class="neo-box-doodle bg-[#ffdd44] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] -rotate-6 flex items-center gap-1">
            <span>🎧</span> 44.1kHz
        </div>
    </div>

    <div class="absolute top-[46%] left-5 2xl:left-12 animate-float-reverse opacity-90">
        <svg class="w-12 h-12" viewBox="0 0 50 50" fill="none">
            <path d="M 10 40 L 22 28 L 35 35 L 40 10 L 15 15 L 22 28 Z" fill="#f7a027" stroke="#1a1a1a" stroke-width="2.5"/>
            <circle cx="40" cy="10" r="4" fill="#8be4d6" stroke="#1a1a1a" stroke-width="2"/>
        </svg>
    </div>

    <div class="absolute top-[53%] left-3 2xl:left-8 animate-float-slow opacity-90">
        <div class="neo-box-doodle bg-[#8be4d6] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] -rotate-3 flex items-center gap-1">
            <span>📑</span> Tugas_Rofiq.docx
        </div>
    </div>

    <div class="absolute top-[60%] left-4 2xl:left-10 animate-float-reverse opacity-90">
        <svg class="w-12 h-12" viewBox="0 0 60 60" fill="none">
            <path d="M 30 5 C 42 18 42 38 42 42 L 18 42 C 18 38 18 18 30 5 Z" fill="#f7a027" stroke="#1a1a1a" stroke-width="2.5"/>
            <circle cx="30" cy="25" r="5" fill="#8be4d6" stroke="#1a1a1a" stroke-width="2"/>
            <path d="M 18 35 L 8 45 L 18 42 Z" fill="#ff7f9d" stroke="#1a1a1a" stroke-width="2"/>
        </svg>
    </div>

    <div class="absolute top-[73%] left-4 2xl:left-10 animate-float-reverse opacity-90">
        <div class="neo-box-doodle bg-[#f7a027] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] -rotate-6 flex items-center gap-1">
            <span>📄</span> CV_Rofiq.pdf
        </div>
    </div>

    <div class="absolute top-[86%] left-4 2xl:left-10 animate-float-reverse opacity-90">
        <div class="neo-box-doodle bg-[#1a1a1a] px-3 py-1.5 font-mono font-bold text-xs text-[#8be4d6] border-2 border-slate-900 shadow-[3px_3px_0px_0px_#8be4d6] -rotate-3">
            &gt;_ main.js
        </div>
    </div>

    <!-- Right Side Doodles -->
    <div class="absolute top-[2%] right-3 2xl:right-8 animate-float-reverse opacity-90">
        <div class="neo-box-doodle bg-[#ff7f9d] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] rotate-6 flex items-center gap-1">
            <span>🚀</span> F = m · a
        </div>
    </div>

    <div class="absolute top-[8%] right-4 2xl:right-10 animate-float-slow opacity-90">
        <div class="neo-box-doodle bg-[#f7a027] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] -rotate-3 flex items-center gap-1">
            <span>📷</span> RAW.cr2
        </div>
    </div>

    <div class="absolute top-[15%] right-3 2xl:right-8 animate-float-reverse opacity-90">
        <svg class="w-14 h-14" viewBox="0 0 70 70" fill="none">
            <ellipse cx="35" cy="35" rx="22" ry="22" fill="#f7a027" stroke="#1a1a1a" stroke-width="2.5"/>
            <ellipse cx="35" cy="35" rx="32" ry="10" fill="none" stroke="#1a1a1a" stroke-width="3" transform="rotate(-20 35 35)"/>
        </svg>
    </div>

    <div class="absolute top-[28%] right-3 2xl:right-8 animate-float-reverse opacity-90">
        <div class="neo-box-doodle bg-[#8be4d6] px-3.5 py-1.5 font-mono font-black text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] -rotate-3 flex items-center gap-1">
            <span>⚙️</span> { ... }
        </div>
    </div>

    <div class="absolute top-[47%] right-4 2xl:right-10 animate-float-slow opacity-90">
        <div class="neo-box-doodle bg-[#ff7f9d] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] rotate-3 flex items-center gap-1">
            <span>🎨</span> Layer_01
        </div>
    </div>

    <div class="absolute top-[54%] right-3 2xl:right-8 animate-float-reverse opacity-90">
        <svg class="w-12 h-12" viewBox="0 0 60 60" fill="none">
            <ellipse cx="30" cy="25" rx="16" ry="12" fill="#8be4d6" stroke="#1a1a1a" stroke-width="2.5"/>
            <ellipse cx="30" cy="34" rx="26" ry="8" fill="#ffdd44" stroke="#1a1a1a" stroke-width="2.5"/>
        </svg>
    </div>

    <div class="absolute top-[61%] right-4 2xl:right-10 animate-float-slow opacity-90">
        <div class="neo-box-doodle bg-[#8be4d6] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] -rotate-3 flex items-center gap-1">
            <span>🎵</span> Voice
        </div>
    </div>

    <div class="absolute top-[87%] right-4 2xl:right-10 animate-float-slow opacity-90">
        <div class="neo-box-doodle bg-[#8be4d6] px-3.5 py-1.5 font-mono font-extrabold text-xs text-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] rotate-3 flex items-center gap-1">
            <span>🌐</span> Host_SSL
        </div>
    </div>

    <div class="absolute top-[93%] right-3 2xl:right-8 animate-float-reverse opacity-90">
        <svg class="w-12 h-12" viewBox="0 0 60 60" fill="none">
            <path d="M 45 15 L 20 30 L 10 45 L 25 35 Z" fill="#c084fc" stroke="#1a1a1a" stroke-width="2"/>
            <circle cx="45" cy="15" r="9" fill="#ffdd44" stroke="#1a1a1a" stroke-width="2.5"/>
        </svg>
    </div>
</div>

<!-- Section Header Neo-brutalist Style -->
<section class="py-12 md:py-16 relative z-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 text-center">
        <h1 data-i18n="pricing_title" class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mb-3">
            Pilih Layanan Sesuai Kebutuhan
        </h1>
        <p data-i18n="pricing_subtitle" class="font-sans text-sm sm:text-base text-slate-700 max-w-xl mx-auto">
            Layanan profesional dengan harga terjangkau dan pengerjaan cepat
        </p>
    </div>
</section>

<!-- Services Section -->
<section class="pb-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 space-y-16">

        @foreach($categories as $category)
        <div>
            <!-- Category Title -->
            <div class="flex items-center gap-4 mb-8 pb-3 border-b-2 border-slate-900">
                <div class="w-12 h-12 rounded-[16px] bg-[#8be4d6] border-[2.5px] border-slate-900 flex items-center justify-center shrink-0 shadow-[3.5px_3.5px_0px_0px_#1a1a1a]">
                    <i class="{{ $category->icon }} text-xl text-slate-900"></i>
                </div>
                <div>
                    <h2 data-i18n="{{ 'cat_' . $category->slug . '_title' }}" class="text-xl sm:text-2xl font-extrabold text-slate-900">{{ $category->name }}</h2>
                    <p data-i18n="{{ 'cat_' . $category->slug . '_desc' }}" class="font-sans text-xs sm:text-sm text-slate-700 font-medium">{{ $category->description }}</p>
                </div>
            </div>

            <!-- Product Cards Grid: 2 Columns on mobile (grid-cols-2), 3 on desktop (lg:grid-cols-3) -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3.5 sm:gap-6 lg:gap-8">
                @foreach($category->services as $index => $service)
                @php
                    // Color scheme per card index
                    $colors = [
                        ['bg' => 'bg-[#8be4d6]'],
                        ['bg' => 'bg-[#f7a027]'],
                        ['bg' => 'bg-[#ffdd44]'],
                        ['bg' => 'bg-[#ff7f9d]'],
                        ['bg' => 'bg-[#c084fc]'],
                    ];
                    $theme = $colors[$loop->index % count($colors)];

                    // Fallback short description if description field is empty
                    $shortDescMap = [
                        'cv-kreatif' => 'Desain CV modern dan menarik untuk berbagai bidang pekerjaan',
                        'cv-ats' => 'CV ramah sistem ATS agar lolos seleksi berkas perusahaan',
                        'surat-lamaran' => 'Surat lamaran kerja profesional dan persuasif',
                        'gabung-pdf' => 'Layanan penggabungan & perapihan berkas dokumen PDF',
                        'makalah-tanpa-materi' => 'Pengerjaan makalah lengkap dari pencarian materi hingga penyusunan',
                        'makalah-ada-materi' => 'Penyusunan & pengetikan makalah dari materi yang sudah Anda siapkan',
                        'jurnal' => 'Jasa pengerjaan dan pembuatan artikel jurnal ilmiah',
                        'joki-tugas' => 'Bantuan pengerjaan berbagai jenis tugas kuliah & sekolah',
                        'web-statis' => 'Website company profile atau portofolio elegan & cepat',
                        'web-dinamis' => 'Website sistem kompleks dengan fitur database dan admin panel',
                        'desain-grafis' => 'Jasa desain logo, spanduk, banner, dan materi promosi',
                        'data-entry' => 'Jasa pengetikan & pengolahan data ke spreadsheet/excel',
                        'jasa-ketik-word' => 'Jasa pengetikan dokumen Word cepat dan rapi',
                        'jasa-excel' => 'Pengerjaan formula, rumus, dan olah data Microsoft Excel',
                    ];
                    $shortDescription = $service->description ?? ($shortDescMap[$service->slug] ?? 'Layanan pengerjaan cepat & profesional');

                    // Calculate crossed out (original higher) price (+30% to +50%)
                    $originalPrice = (int) ($service->price * 1.4);
                    $svcKey = str_replace('-', '_', $service->slug);
                @endphp
                
                <div class="bg-white border-2 sm:border-[2.5px] border-slate-900 rounded-[18px] sm:rounded-[28px] overflow-hidden flex flex-col justify-between shadow-[4px_4px_0px_0px_#1a1a1a] sm:shadow-[6px_6px_0px_0px_#1a1a1a] hover:shadow-[7px_7px_0px_0px_#1a1a1a] transition-all">
                    <div>
                        <!-- Header Card Berwarna: Judul Produk & Deskripsi Singkat -->
                        <div class="{{ $theme['bg'] }} p-3.5 sm:p-6 border-b-2 sm:border-b-[2.5px] border-slate-900">
                            <h3 data-i18n="{{ 'svc_' . $svcKey . '_name' }}" class="text-sm sm:text-2xl font-extrabold text-slate-900 leading-tight mb-1 sm:mb-2">{{ $service->name }}</h3>
                            <p data-i18n="{{ 'svc_' . $svcKey . '_desc' }}" class="text-slate-900/85 font-sans text-[11px] sm:text-sm font-semibold leading-snug line-clamp-2">
                                {{ $shortDescription }}
                            </p>
                        </div>

                        <!-- Foto Produk Nempel Tanpa Padding -->
                        @if($service->thumbnail)
                        <div class="w-full h-28 sm:h-44 border-b-2 sm:border-b-[2.5px] border-slate-900 overflow-hidden">
                            <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                        </div>
                        @endif

                        <!-- Body Content Card: Harga Asli Coret & Harga Promo -->
                        <div class="p-3.5 sm:p-6">
                            <div class="mb-0.5">
                                <span class="text-[10px] sm:text-sm font-normal text-slate-700 line-through">
                                    Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="text-base sm:text-3xl font-extrabold text-slate-900">
                                @if($service->price_display)
                                    Rp {{ $service->price_display }}
                                @else
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Button Action -->
                    <div class="p-3.5 pt-0 sm:p-6 sm:pt-0">
                        <a href="{{ route($service->route_name) }}" class="neo-btn {{ $theme['bg'] }} w-full py-2.5 sm:py-3 text-center text-xs sm:text-sm font-extrabold text-slate-900">
                            <span data-i18n="btn_order_now">Order</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <!-- SEO Content Section Neo-brutalist Style -->
        <div class="bg-white border-[2.5px] border-slate-900 p-7 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h2 data-i18n="feat_quality_title" class="text-xl sm:text-2xl font-extrabold text-slate-900 mb-4">Kenapa Memilih Layanan Kami?</h2>
            <div class="space-y-4 text-slate-700 font-sans text-sm leading-relaxed">
                <p data-i18n="hero_subtitle">
                    Dyanaf Store hadir sebagai solusi lengkap untuk berbagai kebutuhan digital Anda. Kami menyediakan jasa pembuatan CV profesional, desain grafis, pembuatan website, hingga joki tugas akademik dengan kualitas terbaik dan harga yang terjangkau.
                </p>
                <p data-i18n="feat_speed_desc">
                    Proses pemesanan di Dyanaf Store sangat mudah dan cepat. Anda cukup memilih layanan yang dibutuhkan, melakukan pembayaran, dan hasil akan dikirimkan sesuai estimasi waktu.
                </p>
            </div>
        </div>

        <!-- Contact CTA -->
        <div class="text-center p-8 bg-[#ffdd44] border-[2.5px] border-slate-900 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h3 data-i18n="cta_title" class="text-2xl font-extrabold text-slate-900 mb-2">Punya Kebutuhan Lain?</h3>
            <p data-i18n="cta_subtitle" class="font-sans text-sm text-slate-800 mb-6 max-w-md mx-auto font-medium">Tidak menemukan layanan yang Anda cari? Hubungi kami untuk konsultasi gratis dan solusi custom.</p>
            <a href="https://wa.me/6285881721193" target="_blank" class="inline-flex items-center gap-2.5 px-7 py-3 bg-[#8be4d6] text-slate-900 font-extrabold text-sm rounded-[14px] border-[2.5px] border-slate-900 shadow-[4px_4px_0px_0px_#1a1a1a] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_#1a1a1a] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none transition-all">
                <i class="fa-brands fa-whatsapp text-lg"></i>
                <span data-i18n="btn_contact_us">Konsultasi Gratis Sekarang</span>
            </a>
        </div>

    </div>
</section>
@endsection
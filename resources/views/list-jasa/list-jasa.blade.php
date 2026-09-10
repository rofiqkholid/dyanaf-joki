@extends('layouts.app')

@section('title', 'Daftar Harga Layanan')

@section('content')
<!-- Section Header Neo-brutalist Style -->
<section class="py-12 md:py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mb-3">
            Pilih Layanan Sesuai Kebutuhan
        </h1>
        <p class="font-sans text-sm sm:text-base text-slate-700 max-w-xl mx-auto">
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
                    <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900">{{ $category->name }}</h2>
                    <p class="font-sans text-xs sm:text-sm text-slate-700 font-medium">{{ $category->description }}</p>
                </div>
            </div>

            <!-- Product Cards Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
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
                @endphp
                
                <div class="bg-white border-[2.5px] border-slate-900 rounded-[28px] overflow-hidden flex flex-col justify-between shadow-[6px_6px_0px_0px_#1a1a1a] hover:shadow-[9px_9px_0px_0px_#1a1a1a] transition-all">
                    <div>
                        <!-- Header Card Berwarna: Judul Produk & Deskripsi Singkat -->
                        <div class="{{ $theme['bg'] }} p-6 border-b-[2.5px] border-slate-900">
                            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight mb-2">{{ $service->name }}</h3>
                            <p class="text-slate-900/85 font-sans text-xs sm:text-sm font-semibold leading-snug line-clamp-2">
                                {{ $shortDescription }}
                            </p>
                        </div>

                        <!-- Foto Produk Nempel Tanpa Padding -->
                        @if($service->thumbnail)
                        <div class="w-full h-44 border-b-[2.5px] border-slate-900 overflow-hidden">
                            <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                        </div>
                        @endif

                        <!-- Body Content Card: Harga Asli Coret & Harga Promo -->
                        <div class="p-6">
                            <div class="mb-0.5">
                                <span class="text-xs sm:text-sm font-normal text-slate-700 line-through">
                                    Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                                @if($service->price_display)
                                    Rp {{ $service->price_display }}
                                @else
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Button Action -->
                    <div class="p-6 pt-0">
                        <a href="{{ route($service->route_name) }}" class="w-full py-3 text-center text-sm font-extrabold text-slate-900 border-[2.5px] border-slate-900 rounded-[16px] shadow-[4px_4px_0px_0px_#1a1a1a] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_#1a1a1a] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none transition-all flex items-center justify-center gap-2 {{ $theme['bg'] }}">
                            <span>Order / Lihat Paket</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <!-- SEO Content Section Neo-brutalist Style -->
        <div class="bg-white border-[2.5px] border-slate-900 p-7 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 mb-4">Kenapa Memilih Layanan Kami?</h2>
            <div class="space-y-4 text-slate-700 font-sans text-sm leading-relaxed">
                <p>
                    Dyanaf Store hadir sebagai solusi lengkap untuk berbagai kebutuhan digital Anda. Kami menyediakan jasa pembuatan CV profesional, desain grafis, pembuatan website, hingga joki tugas akademik dengan kualitas terbaik dan harga yang terjangkau.
                </p>
                <p>
                    Proses pemesanan di Dyanaf Store sangat mudah dan cepat. Anda cukup memilih layanan yang dibutuhkan, melakukan pembayaran, dan hasil akan dikirimkan sesuai estimasi waktu.
                </p>
            </div>
        </div>

        <!-- Contact CTA -->
        <div class="text-center p-8 bg-[#ffdd44] border-[2.5px] border-slate-900 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Punya Kebutuhan Lain?</h3>
            <p class="font-sans text-sm text-slate-800 mb-6 max-w-md mx-auto font-medium">Tidak menemukan layanan yang Anda cari? Hubungi kami untuk konsultasi gratis dan solusi custom.</p>
            <a href="https://wa.me/6285881721193" target="_blank" class="inline-flex items-center gap-2.5 px-7 py-3 bg-[#8be4d6] text-slate-900 font-extrabold text-sm rounded-[14px] border-[2.5px] border-slate-900 shadow-[4px_4px_0px_0px_#1a1a1a] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_#1a1a1a] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none transition-all">
                <i class="fa-brands fa-whatsapp text-lg"></i>
                Konsultasi Gratis Sekarang
            </a>
        </div>

    </div>
</section>
@endsection
@extends('layouts.app')

@section('title', 'Daftar Harga Layanan')

@section('content')
<!-- Hero Section Neo-brutalist Style -->
<section class="relative pt-24 pb-12 md:pt-32 md:pb-16 bg-[#f7f5ef] border-b-4 border-black">
    <div class="container mx-auto px-4 md:px-6 text-center">
        <h1 class="text-3xl md:text-5xl font-black text-black tracking-tight mb-3">
            Pilih Layanan Sesuai Kebutuhan
        </h1>
        <p class="text-base md:text-lg font-medium text-gray-700 max-w-xl mx-auto">
            Layanan profesional dengan harga terjangkau dan pengerjaan cepat
        </p>
    </div>
</section>

<!-- Services Grid Section Neo-brutalist Style -->
<section class="py-10 md:py-16 bg-[#f7f5ef]">
    <div class="container mx-auto px-4 md:px-6">
        <div class="space-y-12 md:space-y-16">

            @foreach($categories as $category)
            <div>
                <!-- Category Title -->
                <div class="flex items-center gap-3 mb-6 md:mb-8 pb-3 border-b-2 border-black">
                    <div class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center bg-[#2b3a4b] text-white text-lg md:text-2xl rounded-xl border-2 border-black shadow-[3px_3px_0px_0px_rgba(0,0,0,1)]">
                        <i class="{{ $category->icon }}"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-black text-black uppercase tracking-wide">{{ $category->name }}</h2>
                        <p class="text-xs md:text-sm font-medium text-gray-600">{{ $category->description }}</p>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    @foreach($category->services as $service)
                    <div class="bg-white border-4 border-black rounded-3xl p-5 md:p-6 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] hover:shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 flex flex-col justify-between">
                        <div>
                            <!-- Product Image / Thumbnail (Dipertahankan) -->
                            @if($service->thumbnail)
                            <div class="w-full h-40 sm:h-44 rounded-2xl border-2 border-black overflow-hidden mb-5 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            @else
                            <div class="w-full h-40 sm:h-44 bg-[#f0ede4] rounded-2xl border-2 border-black flex items-center justify-center mb-5">
                                <i class="{{ $service->icon }} text-4xl md:text-5xl text-black"></i>
                            </div>
                            @endif

                            <!-- Product Title & Price -->
                            <div class="flex items-start justify-between gap-2 mb-3">
                                <h3 class="font-extrabold text-black text-lg md:text-xl leading-snug">{{ $service->name }}</h3>
                            </div>

                            <div class="mb-4 inline-block px-3 py-1 bg-amber-100 border-2 border-black rounded-lg shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                <span class="font-black text-black text-sm md:text-base">
                                    @if($service->price_display)
                                        {{ $service->price_display }} IDR
                                    @else
                                        {{ number_format($service->price, 0, ',', '.') }} IDR
                                    @endif
                                </span>
                            </div>

                            @if($service->description)
                            <p class="text-xs md:text-sm text-gray-600 mb-4 line-clamp-3 font-medium">
                                {{ $service->description }}
                            </p>
                            @endif
                        </div>

                        <!-- Action Button Neo-brutalist Style -->
                        <a href="{{ route($service->route_name) }}" class="w-full mt-4 py-3 bg-[#4de4b4] hover:bg-[#3cd3a3] text-black font-black text-center text-sm md:text-base rounded-2xl border-3 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-x-1 active:translate-y-1 active:shadow-none transition-all flex items-center justify-center gap-2">
                            <span>View Packages</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

        </div>

        <!-- SEO Content Section Neo-brutalist Style -->
        <div class="mt-12 md:mt-20 bg-white border-4 border-black p-6 md:p-10 rounded-3xl shadow-[6px_6px_0px_0px_rgba(0,0,0,1)]">
            <h2 class="text-xl md:text-3xl font-black text-black mb-4 md:mb-6">Kenapa Memilih Layanan Kami?</h2>
            <div class="space-y-4 text-gray-700 text-sm md:text-base font-medium leading-relaxed">
                <p>
                    Dyanaf Store hadir sebagai solusi lengkap untuk berbagai kebutuhan digital Anda. Kami menyediakan jasa pembuatan CV profesional, desain grafis, pembuatan website, hingga joki tugas akademik dengan kualitas terbaik dan harga yang terjangkau. Setiap layanan dikerjakan oleh tim ahli yang berpengalaman di bidangnya.
                </p>
                <p>
                    Dengan pengalaman melayani ribuan pelanggan, kami memahami bahwa setiap klien memiliki kebutuhan yang unik. Oleh karena itu, kami menawarkan layanan yang fleksibel dengan berbagai pilihan paket harga. Mulai dari CV ATS friendly untuk melamar kerja, desain logo untuk branding bisnis, hingga website dinamis untuk kebutuhan perusahaan Anda.
                </p>
                <p>
                    Proses pemesanan di Dyanaf Store sangat mudah dan cepat. Anda cukup memilih layanan yang dibutuhkan, melakukan pembayaran, dan hasil akan dikirimkan sesuai estimasi waktu. Kami juga menyediakan revisi gratis untuk memastikan kepuasan Anda terhadap hasil pekerjaan kami.
                </p>
            </div>
        </div>

        <!-- Contact CTA Neo-brutalist Style -->
        <div class="mt-8 md:mt-16 text-center p-8 md:p-12 bg-amber-300 border-4 border-black rounded-3xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
            <h3 class="text-2xl md:text-4xl font-black text-black mb-3">Punya Kebutuhan Lain?</h3>
            <p class="text-sm md:text-base font-semibold text-black mb-6 max-w-md mx-auto">Tidak menemukan layanan yang Anda cari? Hubungi kami untuk konsultasi gratis dan solusi custom sesuai kebutuhan Anda</p>
            <a href="https://wa.me/6285881721193" target="_blank" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-black font-black text-base md:text-lg rounded-2xl border-3 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] active:translate-x-1 active:translate-y-1 active:shadow-none transition-all">
                <i class="fab fa-whatsapp text-2xl text-emerald-600"></i>
                Konsultasi Gratis Sekarang
            </a>
        </div>
    </div>
</section>
@endsection
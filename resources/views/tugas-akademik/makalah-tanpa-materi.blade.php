@extends('layouts.app')

@section('title', $service->name)

@section('content')
<!-- Hero Header Section Neo-brutalist Style -->
<section class="py-10 md:py-14 bg-[#faf8ef] text-slate-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-[#8be4d6] text-slate-900 border-2 border-slate-900 rounded-lg text-xs font-black mb-5 shadow-[3px_3px_0px_0px_#1a1a1a]">
            <i class="fa-solid fa-graduation-cap text-slate-900"></i>
            <span>Tugas Akademik & Kuliah</span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mb-4 leading-tight">
            {{ $service->name }}
        </h1>
        
        <p class="font-sans text-sm sm:text-base text-slate-700 max-w-xl mx-auto mb-6">
            Pengerjaan makalah lengkap dari riset materi, penulisan, analisis, hingga daftar pustaka & format rapi.
        </p>

        <div class="inline-flex flex-wrap items-center justify-center gap-4 bg-white text-slate-900 border-2 border-slate-900 px-5 py-2.5 rounded-2xl shadow-[4px_4px_0px_0px_#1a1a1a]">
            <div class="flex items-center gap-2.5 font-bold text-xs sm:text-sm">
                <div class="w-7 h-7 rounded-lg bg-[#ffdd44] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900">
                    <i class="fa-regular fa-clock text-xs"></i>
                </div>
                <span>2 Jam - 1 Hari</span>
            </div>
            <div class="w-px h-5 bg-slate-300"></div>
            <div class="flex items-center gap-2.5 font-black text-sm sm:text-base">
                <div class="w-7 h-7 rounded-lg bg-[#8be4d6] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900">
                    <i class="fa-solid fa-tag text-xs"></i>
                </div>
                <span>Rp {{ number_format($service->price, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Details Section -->
<section class="py-12 md:py-16 bg-[#faf8ef]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-12">
        <!-- About Section Neo-brutalist Card -->
        <div class="bg-white border-[2.5px] border-slate-900 p-6 sm:p-8 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h2 class="text-2xl font-extrabold text-slate-900 mb-4">Tentang Layanan Ini</h2>
            <div class="font-sans text-sm sm:text-base text-slate-700 space-y-4 leading-relaxed">
                <p>
                    <strong>Jasa Pembuatan Makalah (Tanpa Materi)</strong> adalah solusi sempurna ketika Anda membutuhkan makalah untuk topik umum yang tidak memerlukan referensi khusus. Kami akan membuat makalah yang terstruktur dengan baik, menggunakan sumber-sumber kredibel yang relevan dengan topik yang Anda tentukan.
                </p>
                <p>
                    Dengan layanan jasa pembuatan makalah tanpa materi ini, Anda tidak perlu repot mencari bahan atau referensi. Tim penulis kami yang berpengalaman akan melakukan riset mendalam untuk menghasilkan makalah berkualitas tinggi sesuai standar akademik.
                </p>
            </div>
        </div>

        <!-- Features Grid -->
        <div class="bg-white border-[2.5px] border-slate-900 p-6 sm:p-8 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h2 class="text-2xl font-extrabold text-slate-900 mb-6 text-center">Yang Anda Dapatkan</h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-[12px] bg-[#8be4d6] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-bold">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-base mb-1">Format Lengkap & Rapi</h3>
                        <p class="font-sans text-xs text-slate-600">Cover, kata pengantar, daftar isi, BAB I-III, penutup, dan daftar pustaka</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-[12px] bg-[#ffdd44] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-bold">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-base mb-1">Bebas Plagiarisme</h3>
                        <p class="font-sans text-xs text-slate-600">Konten original dan unik, diketik manual bukan copy-paste</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-[12px] bg-[#ff7f9d] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-bold">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-base mb-1">Referensi Kredibel</h3>
                        <p class="font-sans text-xs text-slate-600">Menggunakan sumber terpercaya dari jurnal, buku, dan publikasi ilmiah</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-[12px] bg-[#f7a027] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-bold">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-base mb-1">File Word & PDF</h3>
                        <p class="font-sans text-xs text-slate-600">Mendapatkan file dalam format .docx dan .pdf</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works Section -->
        <div class="bg-[#ffdd44] border-[2.5px] border-slate-900 p-6 sm:p-8 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h2 class="text-2xl font-extrabold text-slate-900 mb-8 text-center">Cara Kerja</h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <div class="bg-white border-2 border-slate-900 p-4 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-lg bg-[#8be4d6] border-2 border-slate-900 flex items-center justify-center shrink-0 text-slate-900 font-black">1</div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-sm mb-1">Pesan & Hubungi Kami</h3>
                        <p class="font-sans text-xs text-slate-700">Sampaikan topik makalah, jumlah halaman, dan deadline Anda.</p>
                    </div>
                </div>
                <div class="bg-white border-2 border-slate-900 p-4 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-lg bg-[#f7a027] border-2 border-slate-900 flex items-center justify-center shrink-0 text-slate-900 font-black">2</div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-sm mb-1">Konfirmasi & Pembayaran</h3>
                        <p class="font-sans text-xs text-slate-700">Kami konfirmasi detail dan setelah deal lakukan pembayaran.</p>
                    </div>
                </div>
                <div class="bg-white border-2 border-slate-900 p-4 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-lg bg-[#ff7f9d] border-2 border-slate-900 flex items-center justify-center shrink-0 text-slate-900 font-black">3</div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-sm mb-1">Proses Pengerjaan</h3>
                        <p class="font-sans text-xs text-slate-700">Tim kami mulai mengerjakan dengan riset mendalam & rapi.</p>
                    </div>
                </div>
                <div class="bg-white border-2 border-slate-900 p-4 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-lg bg-[#c084fc] border-2 border-slate-900 flex items-center justify-center shrink-0 text-slate-900 font-black">4</div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-sm mb-1">Pengiriman & Garansi</h3>
                        <p class="font-sans text-xs text-slate-700">Makalah dikirim sesuai jadwal & garansi revisi jika ada penyesuaian.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Bottom Bar Neo-brutalist -->
<div class="fixed bottom-0 left-0 right-0 bg-white border-t-4 border-slate-900 shadow-[0px_-4px_10px_0px_rgba(0,0,0,0.1)] z-50">
    <div class="max-w-5xl mx-auto px-4 py-3.5 sm:px-6">
        <div class="flex items-center justify-between gap-3">
            <a href="{{ route('list-jasa') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 border-2 border-slate-900 rounded-xl text-slate-900 font-bold text-xs sm:text-sm shadow-[2px_2px_0px_0px_#1a1a1a] transition-all">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali <span class="hidden sm:inline">ke List Harga</span></span>
            </a>

            <div class="flex items-center gap-4">
                <div class="hidden sm:block text-right">
                    <p class="font-extrabold text-slate-900 text-sm leading-tight">{{ $service->name }}</p>
                    <p class="font-black text-slate-900 text-base">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                </div>

                <button data-service-name="{{ $service->name }}" data-service-price="{{ $service->price }}" id="pay-button" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 sm:py-3 bg-[#8be4d6] hover:bg-[#78d6c7] text-slate-900 font-extrabold border-2 border-slate-900 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] active:translate-x-[2px] active:translate-y-[2px] active:shadow-none transition-all text-xs sm:text-sm cursor-pointer">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Order & Bayar</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="h-20"></div>
@endsection
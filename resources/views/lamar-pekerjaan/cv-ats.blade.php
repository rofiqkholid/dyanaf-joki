@extends('layouts.app')

@section('title', $service->name)

@section('content')
<!-- Hero Header Section Neo-brutalist Style -->
<section class="py-10 md:py-14 bg-[#faf8ef] text-slate-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-[#8be4d6] text-slate-900 border-2 border-slate-900 rounded-lg text-xs font-medium mb-5 shadow-[3px_3px_0px_0px_#1a1a1a]">
            <i class="fa-solid fa-file-user text-slate-900"></i>
            <span>Persiapan Lamar Pekerjaan</span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mb-4 leading-tight">
            {{ $service->name }}
        </h1>
        
        <p class="font-sans text-sm sm:text-base text-slate-700 max-w-xl mx-auto mb-6">
            CV ramah sistem ATS agar lolos seleksi berkas otomatis perusahaan nasional & multinasional.
        </p>

        <div class="inline-flex flex-wrap items-center justify-center gap-4 bg-white text-slate-900 border-2 border-slate-900 px-5 py-2.5 rounded-2xl shadow-[4px_4px_0px_0px_#1a1a1a]">
            <div class="flex items-center gap-2.5 font-bold text-xs sm:text-sm">
                <div class="w-7 h-7 rounded-lg bg-[#ffdd44] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900">
                    <i class="fa-regular fa-clock text-xs"></i>
                </div>
                <span>3 Jam</span>
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
        <div class="bg-white border-[2.5px] border-slate-900 p-6 sm:p-8 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h2 class="text-2xl font-extrabold text-slate-900 mb-4"><span data-i18n="detail_about">Tentang Layanan Ini</span></h2>
            <div class="font-sans text-sm sm:text-base text-slate-700 space-y-4 leading-relaxed">
                <p>
                    Banyak perusahaan besar menggunakan sistem ATS untuk menyaring ribuan CV yang masuk. CV ATS-Friendly dirancang khusus agar mudah dibaca oleh sistem ini, sehingga CV Anda lebih besar kemungkinannya lolos ke tahap interview.
                </p>
                <p>
                    <strong>Cocok untuk:</strong> Melamar di perusahaan multinasional, BUMN, startup besar, dan perusahaan yang menggunakan sistem rekrutmen online.
                </p>
            </div>
        </div>

        <div class="bg-white border-[2.5px] border-slate-900 p-6 sm:p-8 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h2 class="text-2xl font-extrabold text-slate-900 mb-6 text-center"><span data-i18n="detail_features">Yang Anda Dapatkan</span></h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-[12px] bg-[#8be4d6] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-bold">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-1">ATS Optimized</h3>
                        <p class="font-sans text-sm text-slate-600">Format yang mudah dibaca oleh Applicant Tracking System</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-[12px] bg-[#ffdd44] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-bold">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-1">Pengerjaan 3 Jam</h3>
                        <p class="font-sans text-sm text-slate-600">Proses pengerjaan super cepat 3 jam selesai</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-[12px] bg-[#ff7f9d] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-bold">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-1">Keyword Optimization</h3>
                        <p class="font-sans text-sm text-slate-600">Penyesuaian kata kunci sesuai posisi pekerjaan yang dilamar</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-[12px] bg-[#f7a027] border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-bold">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-1">Format Word & PDF</h3>
                        <p class="font-sans text-sm text-slate-600">Mendapatkan master file edit (.docx) dan PDF siap kirim</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-[#ffdd44] border-[2.5px] border-slate-900 p-6 sm:p-8 rounded-[24px] shadow-[6px_6px_0px_0px_#1a1a1a]">
            <h2 class="text-2xl font-extrabold text-slate-900 mb-8 text-center"><span data-i18n="detail_how">Cara Kerja</span></h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <div class="bg-white border-2 border-slate-900 p-4 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-lg bg-[#8be4d6] border-2 border-slate-900 flex items-center justify-center shrink-0 text-slate-900 font-black">1</div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-1">Isi Form & Data CV</h3>
                        <p class="font-sans text-sm text-slate-700">Kirimkan riwayat hidup/pengalaman Anda melalui form order.</p>
                    </div>
                </div>
                <div class="bg-white border-2 border-slate-900 p-4 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-lg bg-[#f7a027] border-2 border-slate-900 flex items-center justify-center shrink-0 text-slate-900 font-black">2</div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-1">Pembayaran Instan</h3>
                        <p class="font-sans text-sm text-slate-700">Lakukan pembayaran untuk memproses penulisan CV ATS Anda.</p>
                    </div>
                </div>
                <div class="bg-white border-2 border-slate-900 p-4 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-lg bg-[#ff7f9d] border-2 border-slate-900 flex items-center justify-center shrink-0 text-slate-900 font-black">3</div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-1">Optimasi ATS</h3>
                        <p class="font-sans text-sm text-slate-700">Tim kami menyusun tata letak & kata kunci sesuai standar ATS.</p>
                    </div>
                </div>
                <div class="bg-white border-2 border-slate-900 p-4 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-lg bg-[#c084fc] border-2 border-slate-900 flex items-center justify-center shrink-0 text-slate-900 font-black">4</div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-1">Hasil Dikirim</h3>
                        <p class="font-sans text-sm text-slate-700">CV ATS selesai dikirimkan lengkap dengan garansi revisi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Bottom Bar Neo-brutalist -->
<div class="fixed bottom-0 left-0 right-0 bg-white border-t-4 border-slate-900 shadow-[0px_-4px_10px_0px_rgba(0,0,0,0.1)] z-40">
    <div class="max-w-5xl mx-auto px-4 py-3.5 sm:px-6">
        <div class="flex items-center justify-between gap-3">
            <a href="{{ route('list-jasa') }}" class="neo-btn bg-slate-100 hover:bg-slate-200 px-4 py-2 text-slate-900 font-bold text-xs sm:text-sm gap-2">
                <i class="fa-solid fa-arrow-left"></i>
                <span data-i18n="btn_back_pricing">Kembali ke List Harga</span>
            </a>

            <div class="flex items-center gap-4">
                <div class="hidden sm:block text-right">
                    <p class="font-extrabold text-slate-900 text-sm leading-tight">{{ $service->name }}</p>
                    <p class="font-black text-slate-900 text-base">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                </div>

                <button data-service-name="{{ $service->name }}" data-service-price="{{ $service->price }}" id="pay-button-cv" class="neo-btn neo-btn-cyan px-6 py-2.5 sm:py-3 font-extrabold text-xs sm:text-sm gap-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span data-i18n="btn_order_pay">Order & Bayar</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="h-20"></div>
@endsection
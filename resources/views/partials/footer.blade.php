<footer class="bg-[#faf8ef] border-t-2 border-slate-900 py-12 text-slate-900">
    <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
        <div class="space-y-3">
            <div class="flex items-center gap-3">
                <img src="{{ asset('image/dyanaf-logo-circle.png') }}" alt="Dyanaf Store Logo" class="w-9 h-9 rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_0px_#1a1a1a] object-cover">
                <span class="text-2xl font-extrabold">Dyanaf Store</span>
            </div>
            <p class="font-sans text-sm text-slate-700 leading-relaxed">
                Solusi lengkap untuk kebutuhan digital Anda. Kami membantu mewujudkan impian digital dengan kualitas terbaik.
            </p>
        </div>

        <div>
            <h4 class="font-extrabold text-base mb-4">Layanan</h4>
            <ul class="font-sans text-sm space-y-2.5 text-slate-700 font-medium">
                <li><a href="{{ route('list-jasa') }}" class="hover:text-blue-600 transition-colors">Pembuatan Website</a></li>
                <li><a href="{{ route('list-jasa') }}" class="hover:text-blue-600 transition-colors">CV Profesional</a></li>
                <li><a href="{{ route('list-jasa') }}" class="hover:text-blue-600 transition-colors">Surat Lamaran</a></li>
                <li><a href="{{ route('list-jasa') }}" class="hover:text-blue-600 transition-colors">Desain Grafis</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-extrabold text-base mb-4">Perusahaan</h4>
            <ul class="font-sans text-sm space-y-2.5 text-slate-700 font-medium">
                <li><a href="{{ route('list-jasa') }}" class="hover:text-blue-600 transition-colors">Layanan & Harga</a></li>
                <li><a href="https://wa.me/6285881721193" target="_blank" class="hover:text-blue-600 transition-colors">Hubungi Kami</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-extrabold text-base mb-4">Hubungi Kami</h4>
            <p class="font-sans text-sm text-slate-700 mb-2 font-medium">Email: support@dyanaf.com</p>
            <p class="font-sans text-sm text-slate-700 mb-2 font-medium">WhatsApp: +62 858-8172-1193</p>
            <p class="font-sans text-sm text-slate-700 font-medium">Jam Kerja: Senin - Sabtu, 09:00 - 18:00</p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 border-t border-slate-300 pt-6 text-center font-sans text-sm font-medium text-slate-600">
        © {{ date('Y') }} Dyanaf Store. All rights reserved.
    </div>
</footer>
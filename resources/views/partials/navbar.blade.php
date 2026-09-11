<!-- Top Announcement Banner -->
<div class="bg-[#f7a027] border-b-2 border-slate-900 px-4 py-2.5 text-xs sm:text-sm font-bold text-slate-900 text-center flex items-center justify-center gap-2">
    <span data-i18n="top_banner">🚀 Solusi Digital Terpercaya! Pembuatan Website mulai Rp 599.000 & Jasa CV Profesional hanya Rp 25.000!</span>
</div>

<!-- Navigation Header -->
<header class="bg-white border-b-2 border-slate-900 sticky top-0 z-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-3.5 sm:py-4 flex items-center justify-between">
        <!-- Logo Brand -->
        <a href="https://www.dyanaf.com" class="flex items-center gap-2.5 sm:gap-3">
            <img src="{{ asset('image/dyanaf-logo-circle.png') }}" alt="Dyanaf Store Logo" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-2 border-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] object-cover">
            <span class="text-xl sm:text-2xl font-extrabold tracking-tight text-slate-900">
                Dyanaf Store
            </span>
        </a>

        <!-- Desktop Navigation & WA Button -->
        <div class="hidden sm:flex items-center gap-3">
            <!-- Language Dropdown Desktop -->
            <div class="relative inline-block text-left">
                <button id="lang-btn-desktop" type="button" class="neo-btn bg-white px-3 py-2 text-xs gap-1.5 inline-flex items-center">
                    <span class="inline-flex items-center gap-1">🌐 <span id="current-lang-desktop">Indonesia</span></span>
                    <i class="fa-solid fa-chevron-down text-[10px] leading-none inline-flex items-center"></i>
                </button>
                <div id="lang-dropdown-desktop" class="hidden absolute right-0 mt-2 w-32 bg-white border-2 border-slate-900 rounded-xl py-1.5 z-50 shadow-[4px_4px_0px_0px_#1a1a1a]">
                    <button type="button" class="lang-option w-full text-left px-4 py-2 text-xs font-bold hover:text-blue-600 cursor-pointer transition-colors" data-lang="id">
                        Indonesia
                    </button>
                    <button type="button" class="lang-option w-full text-left px-4 py-2 text-xs font-bold hover:text-blue-600 cursor-pointer transition-colors border-t border-slate-200" data-lang="en">
                        English
                    </button>
                </div>
            </div>

            <a href="https://wa.me/6285881721193?text=Halo%20Dyanaf%20Store,%20saya%20ingin%20konsultasi" target="_blank" class="neo-btn neo-btn-cyan px-5 py-2 text-sm gap-2 inline-flex items-center">
                <i class="fa-brands fa-whatsapp text-lg leading-none inline-flex items-center"></i>
                <span data-i18n="contact_wa" class="leading-none">Contact via WA</span>
            </a>
        </div>

        <!-- Mobile Hamburger Menu Button -->
        <button id="mobile-menu-btn" type="button" class="sm:hidden neo-btn neo-btn-yellow p-2 text-slate-900 cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        </div>

        <!-- Mobile Menu Overlay Dropdown -->
        <div id="mobile-menu" class="hidden sm:hidden absolute top-full left-0 right-0 border-t-2 border-b-2 border-slate-900 bg-[#fffdf0] px-5 py-4 space-y-3 font-bold text-slate-900 shadow-[0px_8px_16px_0px_rgba(0,0,0,0.15)] z-50">
            <a href="{{ route('list-jasa') }}" data-i18n="nav_services" class="block py-1 hover:text-blue-600 transition-colors">Daftar Layanan & Harga</a>
            
            <div class="pt-3 border-t-2 border-slate-900/10 grid grid-cols-2 gap-3 items-center">
                <div class="relative inline-block text-left w-full">
                    <button id="lang-btn-mobile" type="button" class="neo-btn bg-white w-full px-3 py-2.5 text-xs justify-between inline-flex items-center">
                        <span class="truncate inline-flex items-center gap-1">🌐 <span id="current-lang-mobile">Indonesia</span></span>
                        <i class="fa-solid fa-chevron-down text-[10px] shrink-0 ml-1 leading-none inline-flex items-center"></i>
                    </button>
                    <div id="lang-dropdown-mobile" class="hidden absolute left-0 mt-2 w-full bg-white border-2 border-slate-900 rounded-xl py-1.5 z-50 shadow-[4px_4px_0px_0px_#1a1a1a]">
                        <button type="button" class="lang-option w-full text-left px-3 py-2 text-xs font-bold hover:text-blue-600 cursor-pointer transition-colors" data-lang="id">
                            Indonesia
                        </button>
                        <button type="button" class="lang-option w-full text-left px-3 py-2 text-xs font-bold hover:text-blue-600 cursor-pointer transition-colors border-t border-slate-200" data-lang="en">
                            English
                        </button>
                    </div>
                </div>

                <a href="https://wa.me/6285881721193?text=Halo%20Dyanaf%20Store" target="_blank" class="neo-btn neo-btn-cyan w-full py-2.5 text-xs justify-center gap-2 inline-flex items-center">
                    <i class="fa-brands fa-whatsapp text-base leading-none inline-flex items-center"></i>
                    <span data-i18n="contact_wa" class="leading-none font-extrabold">Contact via WA</span>
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>
<!DOCTYPE html>
<html lang="id">

<head>
    <script>window.__loaderStartTime = performance.now();</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dyanaf Store')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('image/dyanaf-logo-circle.png') }}">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #neo-loader {
            transition: opacity 1s ease-out, visibility 1s ease-out;
        }
        #neo-loader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        @keyframes mascot-pop {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.22); }
        }

        .animate-mascot-1,
        .animate-mascot-2,
        .animate-mascot-3 {
            transform-box: fill-box;
            transform-origin: center;
            animation: mascot-pop 0.6s infinite ease-in-out;
            will-change: transform;
            transform: translateZ(0);
        }

        .animate-mascot-1 { animation-delay: 0s; }
        .animate-mascot-2 { animation-delay: 0.2s; }
        .animate-mascot-3 { animation-delay: 0.4s; }

        /* Floating Doodles Animations */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-14px) rotate(4deg); }
        }

        @keyframes float-reverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(14px) rotate(-4deg); }
        }

        .animate-float-slow { animation: float-slow 4.5s infinite ease-in-out; }
        .animate-float-reverse { animation: float-reverse 5.5s infinite ease-in-out; }

        #bg-doodles {
            transform: translateY(60px);
            opacity: 0;
            transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease;
            will-change: transform, opacity;
        }

        #bg-doodles.doodles-active {
            transform: translateY(0);
            opacity: 1;
        }

        .neo-box-doodle {
            border: 2px solid #1a1a1a;
            border-radius: 8px;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-[#faf8ef] text-slate-900 font-sans antialiased min-h-screen flex flex-col relative">
    <!-- Neo Brutalist Loader matching dyanaf-demo -->
    <div id="neo-loader" class="fixed inset-0 z-[9999] bg-[#faf8ef] flex flex-col items-center justify-center">
        <div class="bg-[#ffdd44] p-6 sm:p-8 flex flex-col items-center gap-4 text-center max-w-xs sm:max-w-sm border-[2.5px] border-slate-900 shadow-[8px_8px_0px_0px_#1a1a1a] rounded-2xl">
            <svg class="w-48 sm:w-56 h-auto" viewBox="0 0 320 150" fill="none">
                <g transform="translate(40, 30)">
                    <g class="animate-mascot-1">
                        <ellipse cx="45" cy="55" rx="35" ry="30" fill="#8be4d6" stroke="#1a1a1a" stroke-width="3"/>
                        <path d="M 20 30 L 10 5 L 35 25 Z" fill="#8be4d6" stroke="#1a1a1a" stroke-width="3"/>
                        <path d="M 70 30 L 80 5 L 55 25 Z" fill="#8be4d6" stroke="#1a1a1a" stroke-width="3"/>
                        <circle cx="33" cy="50" r="4" fill="#1a1a1a"/>
                        <circle cx="57" cy="50" r="4" fill="#1a1a1a"/>
                        <circle cx="23" cy="58" r="4" fill="#ff7f9d"/>
                        <circle cx="67" cy="58" r="4" fill="#ff7f9d"/>
                        <path d="M 40 58 Q 45 64 50 58" stroke="#1a1a1a" stroke-width="3" stroke-linecap="round" fill="none"/>
                    </g>
                </g>
                <g transform="translate(110, 15)">
                    <g class="animate-mascot-2">
                        <ellipse cx="50" cy="65" rx="40" ry="35" fill="#f7a027" stroke="#1a1a1a" stroke-width="3"/>
                        <circle cx="20" cy="35" r="14" fill="#f7a027" stroke="#1a1a1a" stroke-width="3"/>
                        <circle cx="80" cy="35" r="14" fill="#f7a027" stroke="#1a1a1a" stroke-width="3"/>
                        <ellipse cx="38" cy="60" rx="4" ry="6" fill="#1a1a1a"/>
                        <ellipse cx="62" cy="60" rx="4" ry="6" fill="#1a1a1a"/>
                        <ellipse cx="50" cy="70" rx="10" ry="7" fill="#ffffff" stroke="#1a1a1a" stroke-width="2"/>
                        <path d="M 50 67 L 50 71 Q 50 75 46 75 M 50 71 Q 50 75 54 75" stroke="#1a1a1a" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                    </g>
                </g>
                <g transform="translate(190, 25)">
                    <g class="animate-mascot-3">
                        <ellipse cx="40" cy="60" rx="30" ry="28" fill="#ffdd44" stroke="#1a1a1a" stroke-width="3"/>
                        <path d="M 25 35 C 15 10 30 -5 35 30" fill="#ffdd44" stroke="#1a1a1a" stroke-width="3"/>
                        <path d="M 55 35 C 65 10 50 -5 45 30" fill="#ffdd44" stroke="#1a1a1a" stroke-width="3"/>
                        <circle cx="30" cy="55" r="3.5" fill="#1a1a1a"/>
                        <circle cx="50" cy="55" r="3.5" fill="#1a1a1a"/>
                        <path d="M 36 63 Q 40 67 44 63" stroke="#1a1a1a" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                    </g>
                </g>
            </svg>
        </div>
    </div>

    @include('partials.navbar')

    <!-- Main Content -->
    <main id="swup" class="relative z-10">
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        // Page Loading Handler matching dyanaf-demo
        document.addEventListener('DOMContentLoaded', () => {
            const neoLoader = document.getElementById('neo-loader');
            const bgDoodles = document.getElementById('bg-doodles');

            if (neoLoader) {
                setTimeout(() => {
                    neoLoader.classList.add('fade-out');
                    if (bgDoodles) bgDoodles.classList.add('doodles-active');
                    setTimeout(() => {
                        neoLoader.style.display = 'none';
                    }, 1000);
                }, 1000);
            }

            // Smooth scroll for hash anchor links only
            document.querySelectorAll('a[href^="#"]').forEach(link => {
                link.addEventListener('click', (e) => {
                    const targetId = link.getAttribute('href');
                    if (targetId && targetId !== '#') {
                        const targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            e.preventDefault();
                            targetElement.scrollIntoView({ behavior: 'smooth' });
                            history.pushState(null, '', window.location.pathname + window.location.search + targetId);
                        }
                    }
                });
            });
        });
    </script>

    <!-- Midtrans Snap -->
    @if(config('midtrans.is_production'))
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @else
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @endif

    @include('partials.toast')
    @include('partials.payment-modal')
    @include('partials.payment-modal-cv')
    @include('partials.custom-payment-ui')
    @include('partials.qris-payment-prototype')
    @include('partials.va-payment-modal')
    @include('partials.gopay-payment-modal')

    @stack('scripts')
</body>

</html>
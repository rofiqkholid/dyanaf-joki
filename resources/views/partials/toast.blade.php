<!-- Toast Notification Container -->
<!-- Mobile: top-4 inset-x-4, Desktop: bottom-6 right-6 -->
<div id="toast-container" class="fixed top-4 left-4 right-4 sm:top-auto sm:left-auto sm:right-6 sm:bottom-6 z-[200] flex flex-col items-center sm:items-end gap-3 pointer-events-none"></div>

<script>
    function getTranslatedToastMessage(msg) {
        const lang = localStorage.getItem('dyanaf_lang') || 'id';
        const map = {
            'Pembayaran QRIS dibatalkan': {
                id: 'Pembayaran QRIS dibatalkan',
                en: 'QRIS Payment cancelled'
            },
            'Pembayaran GoPay dibatalkan': {
                id: 'Pembayaran GoPay dibatalkan',
                en: 'GoPay Payment cancelled'
            },
            'Pembayaran Virtual Account dibatalkan': {
                id: 'Pembayaran Virtual Account dibatalkan',
                en: 'Virtual Account Payment cancelled'
            },
            'Pembayaran dibatalkan': {
                id: 'Pembayaran dibatalkan',
                en: 'Payment cancelled'
            },
            'Pembayaran Berhasil! Mengarahkan ke WhatsApp...': {
                id: 'Pembayaran Berhasil! Mengarahkan ke WhatsApp...',
                en: 'Payment Successful! Redirecting to WhatsApp...'
            },
            'Pembayaran Gagal': {
                id: 'Pembayaran Gagal',
                en: 'Payment Failed'
            },
            'QR Code telah kedaluwarsa. Silakan buat ulang.': {
                id: 'QR Code telah kedaluwarsa. Silakan buat ulang.',
                en: 'QR Code expired. Please regenerate.'
            },
            'QR Code tidak tersedia': {
                id: 'QR Code tidak tersedia',
                en: 'QR Code unavailable'
            },
            'QR Code dibuka di tab baru. Klik kanan untuk menyimpan.': {
                id: 'QR Code dibuka di tab baru. Klik kanan untuk menyimpan.',
                en: 'QR Code opened in a new tab. Right-click to save.'
            },
            'Nomor VA berhasil disalin!': {
                id: 'Nomor VA berhasil disalin!',
                en: 'VA Number copied successfully!'
            },
            'Mohon lengkapi semua field yang wajib diisi': {
                id: 'Mohon lengkapi semua field yang wajib diisi',
                en: 'Please fill in all required fields'
            },
            'Bahasa diubah ke Indonesia': {
                id: 'Bahasa diubah ke Indonesia',
                en: 'Language switched to Indonesian'
            },
            'Language switched to English': {
                id: 'Bahasa diubah ke Indonesia',
                en: 'Language switched to English'
            }
        };

        if (map[msg] && map[msg][lang]) {
            return map[msg][lang];
        }

        if (window.dyanafTranslations) {
            const dict = window.dyanafTranslations[lang] || window.dyanafTranslations.id;
            if (dict && dict[msg]) {
                return dict[msg];
            }
        }

        return msg;
    }

    function showToast(message, type = 'success', persist = false) {
        if (persist) {
            sessionStorage.setItem('pendingToast', JSON.stringify({
                message,
                type
            }));
            window.location.reload();
            return;
        }

        const container = document.getElementById('toast-container');
        if (!container) return;

        const toast = document.createElement('div');
        toast.className = `pointer-events-auto bg-[#ffdd44] border-2 border-slate-900 px-5 py-3 rounded-xl font-extrabold text-sm text-slate-900 shadow-[4px_4px_0px_0px_#1a1a1a] flex items-center gap-3 transition-all duration-300 transform -translate-y-4 sm:translate-y-4 opacity-0 max-w-full sm:max-w-md`;

        const icons = {
            success: '✨',
            error: '⚠️',
            warning: '⚡',
            info: '💡'
        };
        const icon = icons[type] || '✨';
        const translatedMsg = getTranslatedToastMessage(message);

        toast.innerHTML = `
            <span class="text-base flex-shrink-0">${icon}</span>
            <span class="font-extrabold text-slate-900 break-words">${escapeHtml(translatedMsg)}</span>
        `;

        container.appendChild(toast);

        requestAnimationFrame(() => {
            toast.classList.remove('-translate-y-4', 'translate-y-4', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        });

        setTimeout(() => {
            closeToast(toast);
        }, 4000);
    }

    function closeToast(toast) {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('-translate-y-4', 'sm:translate-y-4', 'opacity-0');
        setTimeout(() => toast.remove(), 300);
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Check for pending toast on page load
    document.addEventListener('DOMContentLoaded', function() {
        const pending = sessionStorage.getItem('pendingToast');
        if (pending) {
            sessionStorage.removeItem('pendingToast');
            const {
                message,
                type
            } = JSON.parse(pending);
            // Small delay to ensure page is fully loaded
            setTimeout(() => showToast(message, type), 100);
        }
    });
</script>
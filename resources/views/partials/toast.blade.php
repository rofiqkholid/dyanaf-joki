<!-- Toast Notification Container -->
<!-- Desktop & Mobile: bottom-6 right-6 -->
<div id="toast-container" class="fixed bottom-6 right-6 z-[200] flex flex-col gap-3 pointer-events-none"></div>

<script>
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
        toast.className = `pointer-events-auto bg-[#ffdd44] border-2 border-slate-900 px-5 py-3 rounded-xl font-extrabold text-sm text-slate-900 shadow-[4px_4px_0px_0px_#1a1a1a] flex items-center gap-3 transition-all duration-300 transform translate-y-4 opacity-0`;

        const icons = {
            success: '✨',
            error: '⚠️',
            warning: '⚡',
            info: '💡'
        };
        const icon = icons[type] || '✨';

        toast.innerHTML = `
            <span class="text-base">${icon}</span>
            <span class="font-extrabold text-slate-900">${escapeHtml(message)}</span>
        `;

        container.appendChild(toast);

        requestAnimationFrame(() => {
            toast.classList.remove('translate-y-4', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        });

        setTimeout(() => {
            closeToast(toast);
        }, 4000);
    }

    function closeToast(toast) {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('translate-y-4', 'opacity-0');
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
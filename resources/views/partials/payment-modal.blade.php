<!-- Payment Modal -->
<div id="paymentModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div id="paymentModalBackdrop" class="fixed inset-0 bg-black/50 transition-opacity duration-300 opacity-0"></div>

    <div class="fixed inset-0 z-10 flex items-center justify-center p-0 sm:p-4">
        <!-- Modal Panel -->
        <div id="paymentModalPanel" class="relative w-full h-full sm:h-auto sm:max-h-[90vh] sm:max-w-xl sm:rounded-[24px] bg-[#faf8ef] border-[3px] border-slate-900 text-left shadow-[8px_8px_0px_0px_#1a1a1a] transition-all duration-300 ease-out -translate-y-10 opacity-0 flex flex-col overflow-hidden">

                <!-- Header Kuning Warm Neo-brutalist -->
                <div class="flex items-center justify-between p-5 sm:p-6 border-b-[2.5px] border-slate-900 bg-[#ffdd44] shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-[#8be4d6] border-2 border-slate-900 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-extrabold">
                            <i class="fa-solid fa-credit-card text-base"></i>
                        </div>
                        <div>
                            <span class="text-xl font-extrabold text-slate-900" id="modal-title">Lengkapi Data</span>
                            <p class="text-xs font-bold text-slate-800 hidden sm:block">Mohon lengkapi data berikut untuk melanjutkan pembayaran.</p>
                        </div>
                    </div>
                    <button type="button" onclick="closePaymentModal()" class="w-9 h-9 rounded-xl bg-white border-2 border-slate-900 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 hover:bg-slate-100 flex items-center justify-center font-black cursor-pointer transition-all active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <!-- Step Indicator -->
                <div class="px-5 sm:px-6 py-3.5 bg-[#faf8ef] border-b-[2.5px] border-slate-900">
                    <div class="flex items-center justify-center gap-4 sm:gap-8">
                        <!-- Step 1 - Active -->
                        <div class="flex items-center gap-2">
                            <div class="flex h-6 w-6 items-center justify-center rounded-lg bg-[#8be4d6] border-2 border-slate-900 text-slate-900 text-xs font-black shadow-[1.5px_1.5px_0px_0px_#1a1a1a]">
                                1
                            </div>
                            <span class="text-xs sm:text-sm font-extrabold text-slate-900">Lengkapi Data</span>
                        </div>

                        <!-- Connector Line -->
                        <div class="w-8 sm:w-16 h-[2.5px] bg-slate-900"></div>

                        <!-- Step 2 - Inactive -->
                        <div class="flex items-center gap-2">
                            <div class="flex h-6 w-6 items-center justify-center rounded-lg bg-slate-200 border-2 border-slate-900 text-slate-500 text-xs font-bold">
                                2
                            </div>
                            <span class="text-xs sm:text-sm font-bold text-slate-500">Metode Pembayaran</span>
                        </div>
                    </div>
                </div>

                <!-- Form Content Krem -->
                <div id="payment-form-content" class="flex-1 p-5 sm:p-6 overflow-y-auto overscroll-contain bg-[#faf8ef]">
                    <p class="text-xs font-bold text-slate-700 sm:hidden mb-4">Mohon lengkapi data berikut untuk melanjutkan pembayaran.</p>

                    <div class="space-y-4">
                        <!-- Hidden: Layanan & Total Pembayaran -->
                        <div class="hidden">
                            <label class="block text-xs sm:text-sm font-extrabold text-slate-900">Layanan</label>
                            <div id="payment-service-name" class="mt-1 block w-full rounded-xl border-2 border-slate-900 bg-white px-4 py-3 text-sm font-bold text-slate-900"></div>
                        </div>
                        <div class="hidden">
                            <label class="block text-xs sm:text-sm font-extrabold text-slate-900">Total Pembayaran</label>
                            <div id="payment-price-display" class="mt-1 block w-full rounded-xl border-2 border-slate-900 bg-white px-4 py-3 text-sm font-extrabold text-slate-900"></div>
                        </div>
                        <div>
                            <label for="customer-name" class="block text-xs sm:text-sm font-extrabold text-slate-900 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="customer-name" class="block w-full rounded-xl border-2 border-slate-900 px-4 py-3 text-sm font-bold text-slate-900 bg-white shadow-[3px_3px_0px_0px_#1a1a1a] focus:ring-0 focus:outline-none placeholder:text-slate-400 font-sans" placeholder="Masukkan nama anda">
                            <p class="mt-1.5 text-xs font-extrabold text-red-500 hidden" id="name-error">Nama wajib diisi</p>
                        </div>
                        <div>
                            <label for="customer-phone" class="block text-xs sm:text-sm font-extrabold text-slate-900 mb-1.5">Nomor yang bisa dihubungi: WhatsApp, dll. <span class="text-red-500">*</span></label>
                            <input type="tel" id="customer-phone" class="block w-full rounded-xl border-2 border-slate-900 px-4 py-3 text-sm font-bold text-slate-900 bg-white shadow-[3px_3px_0px_0px_#1a1a1a] focus:ring-0 focus:outline-none placeholder:text-slate-400 font-sans" placeholder="08xxxxxxxxxx">
                            <p class="mt-1.5 text-xs font-extrabold text-red-500 hidden" id="phone-error">Nomor WhatsApp wajib diisi</p>
                        </div>
                    </div>
                </div>

                <!-- Loading Overlay -->
                <div id="payment-loading-overlay" class="hidden flex-1 flex flex-col items-center justify-center p-8 bg-[#faf8ef]">
                    <div class="w-12 h-12 rounded-xl bg-[#8be4d6] border-2 border-slate-900 flex items-center justify-center text-slate-900 font-black shadow-[3px_3px_0px_0px_#1a1a1a] animate-spin mb-4">
                        <i class="fa-solid fa-spinner text-xl"></i>
                    </div>
                    <p class="text-base font-extrabold text-slate-900">Memproses Data...</p>
                    <p class="text-xs font-bold text-slate-600 mt-1">Mohon tunggu sebentar</p>
                </div>

                <!-- Footer with Buttons -->
                <div class="flex flex-row-reverse gap-3 p-5 sm:p-6 border-t-[2.5px] border-slate-900 bg-[#faf8ef] shrink-0">
                    <button type="button" onclick="processPayment()" id="btn-process-payment" class="neo-btn neo-btn-cyan flex-1 sm:flex-none gap-2 px-7 py-3 text-sm">
                        <span>Bayar</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                    <button type="button" onclick="closePaymentModal()" class="neo-btn neo-btn-soft-purple flex-1 sm:flex-none px-6 py-3 text-sm">
                        Batal
                    </button>
                </div>
            </div>
        </div>
</div>

<script>
    let currentServiceName = '';
    let currentPrice = 0;
    let activeOrderId = null;
    let scrollPosition = 0;

    function showPageLoader() {
        const loader = document.getElementById('pageLoader');
        if (loader) {
            loader.classList.remove('hidden');
            loader.style.display = 'flex';
            loader.style.opacity = '1';
            loader.style.visibility = 'visible';
            document.body.classList.add('page-loading');
        }
    }

    function triggerPayment(serviceName, price) {
        currentServiceName = serviceName;
        currentPrice = price;

        // Populate modal
        document.getElementById('payment-service-name').textContent = serviceName;
        document.getElementById('payment-price-display').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
        document.getElementById('customer-name').value = '';
        document.getElementById('customer-phone').value = '';
        document.getElementById('name-error').classList.add('hidden');
        document.getElementById('phone-error').classList.add('hidden');

        // Show modal
        const modal = document.getElementById('paymentModal');
        const backdrop = document.getElementById('paymentModalBackdrop');
        const panel = document.getElementById('paymentModalPanel');

        modal.classList.remove('hidden');

        // Lock body scroll safely
        document.body.style.overflow = 'hidden';

        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('-translate-y-10', 'opacity-0');
            panel.classList.add('translate-y-0', 'opacity-100');
        }, 10);
    }

    // Support for data-attribute based buttons (fixes IDE lint errors)
    document.addEventListener('DOMContentLoaded', function() {
        const payButton = document.getElementById('pay-button');
        if (payButton && payButton.dataset.serviceName) {
            payButton.addEventListener('click', function() {
                const serviceName = this.dataset.serviceName;
                const servicePrice = parseInt(this.dataset.servicePrice);
                triggerPayment(serviceName, servicePrice);
            });
        }
    });

    function closePaymentModal() {
        const modal = document.getElementById('paymentModal');
        const backdrop = document.getElementById('paymentModalBackdrop');
        const panel = document.getElementById('paymentModalPanel');

        backdrop.classList.add('opacity-0');
        panel.classList.remove('translate-y-0', 'opacity-100');
        panel.classList.add('-translate-y-10', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');

            // Unlock body scroll cleanly
            document.body.style.overflow = '';
        }, 300);
    }

    function processPayment() {
        const customerName = document.getElementById('customer-name').value;
        const customerPhone = document.getElementById('customer-phone').value;
        const btn = document.getElementById('btn-process-payment');
        const nameError = document.getElementById('name-error');
        const phoneError = document.getElementById('phone-error');

        let isValid = true;

        if (!customerName.trim()) {
            nameError.classList.remove('hidden');
            isValid = false;
        } else {
            nameError.classList.add('hidden');
        }

        if (!customerPhone.trim()) {
            phoneError.classList.remove('hidden');
            isValid = false;
        } else {
            phoneError.classList.add('hidden');
        }

        if (!isValid) return;

        // Hide form content and footer, show loading overlay
        const formContent = document.getElementById('payment-form-content');
        const loadingOverlay = document.getElementById('payment-loading-overlay');
        const footer = document.querySelector('#paymentModal .bg-\\[\\#faf8ef\\].shrink-0:last-child');

        formContent.classList.add('hidden');
        if (footer) footer.classList.add('hidden');
        loadingOverlay.classList.remove('hidden');

        // Wait 1.5 seconds then show payment modal
        setTimeout(() => {
            // Reset - show form and footer, hide loading
            formContent.classList.remove('hidden');
            if (footer) footer.classList.remove('hidden');
            loadingOverlay.classList.add('hidden');

            // Close current modal and show custom payment UI
            closePaymentModal();

            // Show custom payment modal with collected data
            if (typeof showCustomPaymentModal === 'function') {
                setTimeout(() => {
                    showCustomPaymentModal(currentServiceName, currentPrice, customerName, customerPhone);
                }, 300);
            }
        }, 1500);
    }

    function handlePaymentSuccess(orderId) {
        const customerName = document.getElementById('customer-name').value;

        fetch('{{ route("api.payment.success") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                order_id: orderId
            })
        }).then(() => {
            showToast('Pembayaran Berhasil! Mengarahkan ke WhatsApp...', 'success');

            const message = `Saya sudah melakukan pembayaran, berikut detail pesanan saya:

*Order ID:* ${orderId}
*Nama:* ${customerName}
*Layanan:* ${currentServiceName}
*Total:* Rp ${new Intl.NumberFormat('id-ID').format(currentPrice)}

Mohon segera diproses. Terima kasih!`;

            const waNumber = '6285881721193';
            const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;
            setTimeout(() => {
                window.location.href = waUrl;
            }, 1500);
        });
    }

    function handlePaymentCancel(orderId, message) {
        fetch('{{ route("api.payment.cancel") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                order_id: orderId
            })
        }).then(() => {
            // Show loading overlay then reload with toast
            showPageLoader();
            showToast(message, 'warning', true);
        });
    }
</script>
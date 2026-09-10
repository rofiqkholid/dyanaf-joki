<!-- GoPay Payment Modal (Core API) -->
<div id="gopayPaymentModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="gopay-payment-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div id="gopayBackdrop" class="fixed inset-0 bg-black/50 transition-opacity duration-300 opacity-0"></div>

    <div class="fixed inset-0 z-10 flex items-center justify-center p-0 sm:p-4">
        <!-- Modal Panel -->
        <div id="gopayPanel" class="relative w-full h-full sm:h-auto sm:max-h-[90vh] sm:max-w-2xl bg-[#faf8ef] rounded-none sm:rounded-[24px] border-0 sm:border-[3px] border-slate-900 shadow-none sm:shadow-[8px_8px_0px_0px_#1a1a1a] transition-all duration-300 ease-out scale-95 opacity-0 flex flex-col overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 bg-[#ffdd44] text-slate-900 border-b-[2.5px] border-slate-900 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-[#8be4d6] border-2 border-slate-900 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-extrabold">
                        <i class="fas fa-wallet text-base"></i>
                    </div>
                    <span class="text-lg font-extrabold text-slate-900" id="gopay-payment-title">Pembayaran GoPay</span>
                </div>
                <button type="button" onclick="closeGopayModal()" class="w-9 h-9 rounded-xl bg-white border-2 border-slate-900 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 hover:bg-slate-100 flex items-center justify-center font-black cursor-pointer transition-all active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Order Summary -->
            <div class="px-6 py-4 bg-[#faf8ef] border-b-[2.5px] border-slate-900 shrink-0">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs font-bold text-slate-600 mb-1">Layanan</p>
                        <p class="text-base font-extrabold text-slate-900" id="gopay-service-name"></p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-bold text-slate-600 mb-1">Total Pembayaran</p>
                        <p class="text-xl font-black text-slate-900" id="gopay-price-display"></p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2 text-sm font-bold text-slate-700">
                    <i class="fas fa-user text-slate-900"></i>
                    <span id="gopay-customer-name"></span>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 px-6 py-4 overflow-y-auto bg-[#faf8ef]">

                <!-- Loading State -->
                <div id="gopay-loading" class="text-center py-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-[#ffdd44] rounded-2xl border-2 border-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] mb-4 animate-pulse">
                        <i class="fas fa-spinner fa-spin text-slate-900 text-2xl"></i>
                    </div>
                    <p class="text-slate-900 font-extrabold">Memproses Pembayaran GoPay...</p>
                    <p class="text-slate-600 text-sm mt-1 font-bold">Mohon tunggu sebentar</p>
                </div>

                <!-- GoPay Content (QR or Deeplink) -->
                <div id="gopay-content" class="hidden">
                    <!-- Desktop: Show QR Code -->
                    <div id="gopay-qr-section" class="bg-white border-2 border-slate-900 rounded-2xl shadow-[4px_4px_0px_0px_#1a1a1a] p-6 text-center">
                        <!-- Countdown Timer -->
                        <div class="bg-[#faf8ef] border-2 border-slate-900 rounded-xl p-4 mb-4">
                            <p class="text-xs font-bold text-slate-600 mb-2 text-center">QR Code berlaku dalam</p>
                            <div class="flex items-center justify-center gap-2">
                                <i class="fas fa-clock text-lg text-slate-900"></i>
                                <p id="gopay-countdown" class="text-2xl font-black font-mono text-slate-900">15:00</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-lg font-black text-slate-900 mb-1">Scan dengan Aplikasi GoPay/Gojek</p>
                            <p class="text-sm font-bold text-slate-600">Khusus untuk pembayaran via <strong>GoPay</strong>. Gunakan aplikasi Gojek atau GoPay.</p>
                        </div>

                        <div class="flex justify-center mb-4">
                            <div class="p-4 bg-white border-2 border-slate-900 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] inline-block">
                                <img id="gopay-qr-image" src="" alt="GoPay QR Code" class="w-64 h-64">
                            </div>
                        </div>

                        <!-- Download Button -->
                        <div class="mb-4">
                            <button type="button" onclick="downloadGopayQr()" class="inline-flex items-center gap-2 px-6 py-3 bg-[#8be4d6] text-slate-900 border-2 border-slate-900 rounded-xl font-extrabold shadow-[3px_3px_0px_0px_#1a1a1a] hover:-translate-x-0.5 hover:-translate-y-0.5 hover:shadow-[5px_5px_0px_0px_#1a1a1a] active:translate-x-0.5 active:translate-y-0.5 active:shadow-[1.5px_1.5px_0px_0px_#1a1a1a] transition-all cursor-pointer">
                                <i class="fas fa-download"></i>
                                <span>Download QR Code</span>
                            </button>
                        </div>

                        <div class="bg-[#faf8ef] border-2 border-slate-900 rounded-xl p-4">
                            <p class="text-sm font-bold text-slate-600 mb-1">Status Pembayaran:</p>
                            <div id="gopay-payment-status" class="flex items-center justify-center gap-2">
                                <div class="w-3 h-3 bg-amber-400 border border-slate-900 rounded-full animate-pulse"></div>
                                <span class="text-sm font-extrabold text-slate-900">Menunggu Pembayaran...</span>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile: Show Deeplink Button -->
                    <div id="gopay-deeplink-section" class="hidden text-center py-8">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-[#ffdd44] border-2 border-slate-900 rounded-2xl shadow-[4px_4px_0px_0px_#1a1a1a] mb-6">
                            <i class="fas fa-wallet text-slate-900 text-3xl"></i>
                        </div>
                        <p class="text-lg font-black text-slate-900 mb-1">Buka Aplikasi GoPay/Gojek</p>
                        <p class="text-sm font-bold text-slate-600 mb-6">Klik tombol di bawah untuk membuka aplikasi dan menyelesaikan pembayaran</p>

                        <a id="gopay-deeplink-btn" href="#" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#8be4d6] text-slate-900 border-2 border-slate-900 font-extrabold rounded-xl shadow-[4px_4px_0px_0px_#1a1a1a] hover:-translate-x-0.5 hover:-translate-y-0.5 hover:shadow-[6px_6px_0px_0px_#1a1a1a] active:translate-x-0.5 active:translate-y-0.5 active:shadow-[2px_2px_0px_0px_#1a1a1a] transition-all">
                            <i class="fas fa-external-link-alt"></i>
                            Buka Aplikasi GoPay
                        </a>

                        <div class="mt-6 bg-[#faf8ef] border-2 border-slate-900 rounded-xl p-4">
                            <p class="text-sm font-bold text-slate-600 mb-1">Status Pembayaran:</p>
                            <div id="gopay-mobile-status" class="flex items-center justify-center gap-2">
                                <div class="w-3 h-3 bg-amber-400 border border-slate-900 rounded-full animate-pulse"></div>
                                <span class="text-sm font-extrabold text-slate-900">Menunggu Pembayaran...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error State -->
                <div id="gopay-error" class="hidden text-center py-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-[#ff6b6b] border-2 border-slate-900 rounded-2xl shadow-[3px_3px_0px_0px_#1a1a1a] mb-4">
                        <i class="fas fa-exclamation-triangle text-slate-900 text-2xl"></i>
                    </div>
                    <p class="text-slate-900 font-black text-lg mb-1">Gagal Memproses Pembayaran</p>
                    <p id="gopay-error-message" class="text-slate-700 font-bold text-sm"></p>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-6 py-4 border-t-[2.5px] border-slate-900 bg-[#faf8ef] shrink-0">
                <button type="button" onclick="closeGopayModal()" class="w-full h-12 flex items-center justify-center rounded-xl bg-[#d8b4fe] hover:bg-[#c084fc] border-2 border-slate-900 text-slate-900 font-extrabold shadow-[4px_4px_0px_0px_#1a1a1a] hover:-translate-x-0.5 hover:-translate-y-0.5 hover:shadow-[6px_6px_0px_0px_#1a1a1a] active:translate-x-0.5 active:translate-y-0.5 active:shadow-[2px_2px_0px_0px_#1a1a1a] transition-all cursor-pointer">
                    <span class="text-sm">Tutup</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let gopayData = {
        serviceName: '',
        price: 0,
        customerName: '',
        phone: '',
        orderId: null,
        paymentSuccess: false
    };
    let gopayScrollPosition = 0;
    let gopayStatusCheckInterval = null;

    function showGopayPayment(serviceName, price, customerName, phone, existingOrderId = null) {
        gopayData = {
            serviceName: serviceName,
            price: price,
            customerName: customerName,
            phone: phone,
            orderId: existingOrderId, // Use existing order if provided
            paymentSuccess: false
        };

        // Populate modal
        document.getElementById('gopay-service-name').textContent = serviceName;
        document.getElementById('gopay-price-display').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
        document.getElementById('gopay-customer-name').textContent = customerName;

        // Show modal
        const modal = document.getElementById('gopayPaymentModal');
        const backdrop = document.getElementById('gopayBackdrop');
        const panel = document.getElementById('gopayPanel');

        modal.classList.remove('hidden');

        // Lock scroll safely
        document.body.style.overflow = 'hidden';

        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('scale-95', 'opacity-0');
            panel.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Reset states
        document.getElementById('gopay-loading').classList.remove('hidden');
        document.getElementById('gopay-content').classList.add('hidden');
        document.getElementById('gopay-error').classList.add('hidden');

        // Create GoPay charge
        createGopayCharge();
    }

    function createGopayCharge() {
        const requestBody = {
            payment_method: 'gopay',
            service_name: gopayData.serviceName,
            price: gopayData.price,
            customer_name: gopayData.customerName,
            phone: gopayData.phone
        };

        // Include existing order_id if available
        if (gopayData.orderId) {
            requestBody.order_id = gopayData.orderId;
        }

        fetch('/api/payment/core/charge', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(requestBody)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    gopayData.orderId = data.order_id;

                    // Hide loading, show content
                    document.getElementById('gopay-loading').classList.add('hidden');
                    document.getElementById('gopay-content').classList.remove('hidden');

                    // Check if mobile (has deeplink)
                    const isMobile = /android|iphone|ipad|mobile/i.test(navigator.userAgent);

                    if (isMobile && data.deeplink) {
                        // Mobile: Show deeplink button
                        document.getElementById('gopay-qr-section').classList.add('hidden');
                        document.getElementById('gopay-deeplink-section').classList.remove('hidden');
                        document.getElementById('gopay-deeplink-btn').href = data.deeplink;
                    } else if (data.qr_code_url) {
                        // Desktop: Show QR code
                        document.getElementById('gopay-qr-section').classList.remove('hidden');
                        document.getElementById('gopay-deeplink-section').classList.add('hidden');
                        document.getElementById('gopay-qr-image').src = data.qr_code_url;
                        gopayData.qrCodeUrl = data.qr_code_url; // Save for download

                        // Start countdown timer (15 minutes)
                        startGopayCountdown(15 * 60);
                    }

                    // Start checking payment status
                    startGopayStatusChecking();
                } else {
                    showGopayError(data.error || 'Gagal memproses pembayaran GoPay');
                }
            })
            .catch(error => {
                console.error(error);
                showGopayError('Terjadi kesalahan sistem');
            });
    }

    function startGopayStatusChecking() {
        // Check every 3 seconds
        gopayStatusCheckInterval = setInterval(() => {
            fetch(`/api/payment/status/${gopayData.orderId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'settlement' || data.status === 'capture') {
                        clearInterval(gopayStatusCheckInterval);

                        // Update status display
                        const statusDiv = document.getElementById('gopay-payment-status');
                        const mobileStatusDiv = document.getElementById('gopay-mobile-status');
                        const successHtml = `
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm font-medium text-green-700">Pembayaran Berhasil!</span>
                        `;
                        if (statusDiv) statusDiv.innerHTML = successHtml;
                        if (mobileStatusDiv) mobileStatusDiv.innerHTML = successHtml;

                        setTimeout(() => {
                            gopayData.paymentSuccess = true;
                            closeGopayModal();
                            handleGopaySuccess();
                        }, 2000);
                    }
                });
        }, 3000);

        // Stop after 15 minutes
        setTimeout(() => {
            if (gopayStatusCheckInterval) {
                clearInterval(gopayStatusCheckInterval);
            }
        }, 900000);
    }

    function handleGopaySuccess() {
        if (typeof showToast === 'function') {
            showToast('Pembayaran Berhasil! Mengarahkan ke WhatsApp...', 'success');
        }

        const message = `Saya sudah melakukan pembayaran via GoPay:

*Order ID:* ${gopayData.orderId}
*Nama:* ${gopayData.customerName}
*Layanan:* ${gopayData.serviceName}
*Total:* Rp ${new Intl.NumberFormat('id-ID').format(gopayData.price)}

Mohon segera diproses. Terima kasih!`;

        const waNumber = '6285881721193';
        const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;

        setTimeout(() => {
            window.location.href = waUrl;
        }, 1500);
    }

    function showGopayError(message) {
        document.getElementById('gopay-loading').classList.add('hidden');
        document.getElementById('gopay-content').classList.add('hidden');
        document.getElementById('gopay-error').classList.remove('hidden');
        document.getElementById('gopay-error-message').textContent = message;
    }

    function closeGopayModal() {
        // Cancel transaction if exists and payment not successful
        if (gopayData.orderId && !gopayData.paymentSuccess) {
            fetch('{{ route("api.payment.cancel") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    order_id: gopayData.orderId
                })
            }).then(() => {
                console.log('GoPay transaction cancelled');
                if (typeof showToast === 'function') {
                    showToast('Pembayaran GoPay dibatalkan', 'info');
                }
            }).catch(err => console.error('Cancel error:', err));
        }

        // Stop status checking
        if (gopayStatusCheckInterval) {
            clearInterval(gopayStatusCheckInterval);
            gopayStatusCheckInterval = null;
        }

        const modal = document.getElementById('gopayPaymentModal');
        const backdrop = document.getElementById('gopayBackdrop');
        const panel = document.getElementById('gopayPanel');

        backdrop.classList.add('opacity-0');
        panel.classList.remove('scale-100', 'opacity-100');
        panel.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');

            // Unlock scroll
            document.body.style.overflow = '';

            // Stop countdown
            stopGopayCountdown();

            // Clear data
            gopayData.orderId = null;
            gopayData.qrCodeUrl = null;
            gopayData.paymentSuccess = false;
        }, 300);
    }

    // GoPay Countdown timer variables
    let gopayCountdownInterval = null;
    let gopayCountdownSeconds = 0;

    function startGopayCountdown(seconds) {
        gopayCountdownSeconds = seconds;
        updateGopayCountdownDisplay();

        gopayCountdownInterval = setInterval(() => {
            gopayCountdownSeconds--;
            updateGopayCountdownDisplay();

            if (gopayCountdownSeconds <= 0) {
                stopGopayCountdown();
                document.getElementById('gopay-countdown').textContent = '00:00';
                if (typeof showToast === 'function') {
                    showToast('QR Code telah kedaluwarsa. Silakan buat ulang.', 'warning');
                }
            }
        }, 1000);
    }

    function updateGopayCountdownDisplay() {
        const minutes = Math.floor(gopayCountdownSeconds / 60);
        const seconds = gopayCountdownSeconds % 60;
        const display = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        document.getElementById('gopay-countdown').textContent = display;
    }

    function stopGopayCountdown() {
        if (gopayCountdownInterval) {
            clearInterval(gopayCountdownInterval);
            gopayCountdownInterval = null;
        }
        document.getElementById('gopay-countdown').textContent = '15:00';
    }

    function downloadGopayQr() {
        if (!gopayData.qrCodeUrl) {
            if (typeof showToast === 'function') {
                showToast('QR Code tidak tersedia', 'error');
            }
            return;
        }
        window.open(gopayData.qrCodeUrl, '_blank');
        if (typeof showToast === 'function') {
            showToast('QR Code dibuka di tab baru. Klik kanan untuk menyimpan.', 'info');
        }
    }
</script>
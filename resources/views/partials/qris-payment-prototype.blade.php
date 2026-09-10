<!-- QRIS Custom Payment UI (Core API Prototype) -->
<div id="qrisPaymentModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="qris-payment-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div id="qrisBackdrop" class="fixed inset-0 bg-black/50 transition-opacity duration-300 opacity-0"></div>

    <div class="fixed inset-0 z-10 flex items-center justify-center p-0 sm:p-4">
        <!-- Modal Panel -->
        <div id="qrisPanel" class="relative w-full h-full sm:h-auto sm:max-h-[90vh] sm:max-w-2xl bg-[#faf8ef] sm:rounded-[24px] border-[3px] border-slate-900 shadow-[8px_8px_0px_0px_#1a1a1a] transition-all duration-300 ease-out scale-95 opacity-0 flex flex-col overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 bg-[#ffdd44] text-slate-900 border-b-[2.5px] border-slate-900 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-[#8be4d6] border-2 border-slate-900 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 font-extrabold">
                        <i class="fas fa-qrcode text-base"></i>
                    </div>
                    <span class="text-lg font-extrabold text-slate-900" id="qris-payment-title">Pembayaran QRIS</span>
                </div>
                <button type="button" onclick="closeQrisModal()" class="w-9 h-9 rounded-xl bg-white border-2 border-slate-900 shadow-[2px_2px_0px_0px_#1a1a1a] text-slate-900 hover:bg-slate-100 flex items-center justify-center font-black cursor-pointer transition-all active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Order Summary -->
            <div class="px-6 py-4 bg-[#faf8ef] border-b-[2.5px] border-slate-900 shrink-0">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs font-bold text-slate-600 mb-1">Layanan</p>
                        <p class="text-base font-extrabold text-slate-900" id="qris-service-name"></p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-bold text-slate-600 mb-1">Total Pembayaran</p>
                        <p class="text-xl font-black text-slate-900" id="qris-price-display"></p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2 text-sm font-bold text-slate-700">
                    <i class="fas fa-user text-slate-900"></i>
                    <span id="qris-customer-name"></span>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 px-6 py-4 overflow-y-auto bg-[#faf8ef]">

                <!-- Loading State -->
                <div id="qris-loading" class="text-center py-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-[#ffdd44] rounded-2xl border-2 border-slate-900 shadow-[3px_3px_0px_0px_#1a1a1a] mb-4 animate-pulse">
                        <i class="fas fa-spinner fa-spin text-slate-900 text-2xl"></i>
                    </div>
                    <p class="text-slate-900 font-extrabold">Membuat QR Code...</p>
                    <p class="text-slate-600 text-sm mt-1 font-bold">Mohon tunggu sebentar</p>
                </div>

                <!-- QR Code Display -->
                <div id="qris-content" class="hidden">
                    <div class="bg-white border-2 border-slate-900 rounded-2xl shadow-[4px_4px_0px_0px_#1a1a1a] p-6 text-center">
                        <!-- Countdown Timer -->
                        <div class="bg-[#faf8ef] border-2 border-slate-900 rounded-xl p-4 mb-4">
                            <p class="text-xs font-bold text-slate-600 mb-2 text-center">QR Code berlaku dalam</p>
                            <div class="flex items-center justify-center gap-2">
                                <i class="fas fa-clock text-lg text-slate-900"></i>
                                <p id="qris-countdown" class="text-2xl font-black font-mono text-slate-900">15:00</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-lg font-black text-slate-900 mb-1">Scan QR Code</p>
                            <p class="text-sm font-bold text-slate-600">Gunakan aplikasi e-wallet (GoPay, OVO, Dana, ShopeePay, dll)</p>
                        </div>

                        <div class="flex justify-center mb-4">
                            <div class="p-4 bg-white border-2 border-slate-900 rounded-xl shadow-[3px_3px_0px_0px_#1a1a1a] inline-block">
                                <img id="qris-qr-image" src="" alt="QRIS Code" class="w-64 h-64">
                            </div>
                        </div>

                        <!-- Download QRIS Button -->
                        <div class="mb-4">
                            <button type="button" onclick="downloadQrisImage()" class="neo-btn neo-btn-cyan gap-2 px-6 py-3 text-sm">
                                <i class="fas fa-download"></i>
                                <span>Download QR Code</span>
                            </button>
                        </div>

                        <div class="bg-[#faf8ef] border-2 border-slate-900 rounded-xl p-4">
                            <p class="text-sm font-bold text-slate-600 mb-1">Status Pembayaran:</p>
                            <div id="payment-status" class="flex items-center justify-center gap-2">
                                <div class="w-3 h-3 bg-amber-400 border border-slate-900 rounded-full animate-pulse"></div>
                                <span class="text-sm font-extrabold text-slate-900">Menunggu Pembayaran...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error State -->
                <div id="qris-error" class="hidden text-center py-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-[#ff6b6b] border-2 border-slate-900 rounded-2xl shadow-[3px_3px_0px_0px_#1a1a1a] mb-4">
                        <i class="fas fa-exclamation-triangle text-slate-900 text-2xl"></i>
                    </div>
                    <p class="text-slate-900 font-black text-lg mb-1">Gagal Membuat QR Code</p>
                    <p id="qris-error-message" class="text-slate-700 font-bold text-sm"></p>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-6 py-4 border-t-[2.5px] border-slate-900 bg-[#faf8ef] shrink-0">
                <button type="button" onclick="closeQrisModal()" class="neo-btn neo-btn-soft-purple w-full py-3 text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let qrisData = {
        serviceName: '',
        price: 0,
        customerName: '',
        phone: '',
        orderId: null,
        paymentSuccess: false
    };
    let qrisScrollPosition = 0;
    let statusCheckInterval = null;

    function showQrisPayment(serviceName, price, customerName, phone, existingOrderId = null) {
        qrisData = {
            serviceName: serviceName,
            price: price,
            customerName: customerName,
            phone: phone,
            orderId: existingOrderId, // Use existing order if provided
            paymentSuccess: false
        };

        // Populate modal
        document.getElementById('qris-service-name').textContent = serviceName;
        document.getElementById('qris-price-display').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
        document.getElementById('qris-customer-name').textContent = customerName;

        // Show modal
        const modal = document.getElementById('qrisPaymentModal');
        const backdrop = document.getElementById('qrisBackdrop');
        const panel = document.getElementById('qrisPanel');

        modal.classList.remove('hidden');

        // Lock scroll safely
        document.body.style.overflow = 'hidden';

        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('scale-95', 'opacity-0');
            panel.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Reset states
        document.getElementById('qris-loading').classList.remove('hidden');
        document.getElementById('qris-content').classList.add('hidden');
        document.getElementById('qris-error').classList.add('hidden');

        // Create QRIS charge
        createQrisCharge();
    }

    function createQrisCharge() {
        const requestBody = {
            payment_method: 'qris',
            service_name: qrisData.serviceName,
            price: qrisData.price,
            customer_name: qrisData.customerName,
            phone: qrisData.phone
        };

        // Include existing order_id if available
        if (qrisData.orderId) {
            requestBody.order_id = qrisData.orderId;
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
                // Handling SNAP TOKEN (Prodcution Fallback)
                if (data.success && data.snap_token) {
                    document.getElementById('qris-loading').classList.add('hidden');
                    closeQrisModal();

                    window.snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            // Handle logic success
                            qrisData.orderId = data.order_id;
                            handleQrisSuccess();
                        },
                        onPending: function(result) {
                            // If pending, maybe we simulate success or wait
                        },
                        onError: function(result) {
                            showToast('Pembayaran Gagal', 'error');
                        }
                    });
                    return;
                }

                if (data.success && data.qr_code_url) {
                    qrisData.orderId = data.order_id;
                    qrisData.qrCodeUrl = data.qr_code_url; // Save for download

                    // Hide loading, show QR code
                    document.getElementById('qris-loading').classList.add('hidden');
                    document.getElementById('qris-content').classList.remove('hidden');
                    document.getElementById('qris-qr-image').src = data.qr_code_url;

                    // Start countdown timer (15 minutes)
                    startCountdown(15 * 60);

                    // Start checking payment status
                    startStatusChecking();
                } else {
                    showQrisError(data.error || 'Gagal membuat QR Code');
                }
            })
            .catch(error => {
                console.error(error);
                showQrisError('Terjadi kesalahan sistem');
            });
    }

    function startStatusChecking() {
        // Check every 3 seconds
        statusCheckInterval = setInterval(() => {
            fetch(`/api/payment/status/${qrisData.orderId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'settlement' || data.status === 'capture') {
                        clearInterval(statusCheckInterval);

                        // Update status display
                        const statusDiv = document.getElementById('payment-status');
                        statusDiv.innerHTML = `
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm font-medium text-green-700">Pembayaran Berhasil!</span>
                        `;

                        setTimeout(() => {
                            qrisData.paymentSuccess = true;
                            closeQrisModal();
                            handleQrisSuccess();
                        }, 2000);
                    }
                });
        }, 3000);

        // Stop after 15 minutes
        setTimeout(() => {
            if (statusCheckInterval) {
                clearInterval(statusCheckInterval);
            }
        }, 900000);
    }

    function handleQrisSuccess() {
        if (typeof showToast === 'function') {
            showToast('Pembayaran Berhasil! Mengarahkan ke WhatsApp...', 'success');
        }

        const message = `Saya sudah melakukan pembayaran via QRIS:

*Order ID:* ${qrisData.orderId}
*Nama:* ${qrisData.customerName}
*Layanan:* ${qrisData.serviceName}
*Total:* Rp ${new Intl.NumberFormat('id-ID').format(qrisData.price)}

Mohon segera diproses. Terima kasih!`;

        const waNumber = '6285881721193';
        const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;

        setTimeout(() => {
            window.location.href = waUrl;
        }, 1500);
    }

    function showQrisError(message) {
        document.getElementById('qris-loading').classList.add('hidden');
        document.getElementById('qris-content').classList.add('hidden');
        document.getElementById('qris-error').classList.remove('hidden');
        document.getElementById('qris-error-message').textContent = message;
    }

    function closeQrisModal() {
        // Cancel transaction if exists and payment not successful
        if (qrisData.orderId && !qrisData.paymentSuccess) {
            fetch('{{ route("api.payment.cancel") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    order_id: qrisData.orderId
                })
            }).then(() => {
                console.log('QRIS transaction cancelled');
                if (typeof showToast === 'function') {
                    showToast('Pembayaran QRIS dibatalkan', 'info');
                }
            }).catch(err => console.error('Cancel error:', err));
        }

        // Stop status checking
        if (statusCheckInterval) {
            clearInterval(statusCheckInterval);
            statusCheckInterval = null;
        }

        const modal = document.getElementById('qrisPaymentModal');
        const backdrop = document.getElementById('qrisBackdrop');
        const panel = document.getElementById('qrisPanel');

        backdrop.classList.add('opacity-0');
        panel.classList.remove('scale-100', 'opacity-100');
        panel.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');

            // Unlock scroll cleanly
            document.body.style.overflow = '';

            // Stop countdown
            stopCountdown();

            // Clear data for fresh start next time
            qrisData.orderId = null;
            qrisData.qrCodeUrl = null;
            qrisData.paymentSuccess = false;
        }, 300);
    }

    // Countdown timer variables
    let countdownInterval = null;
    let countdownSeconds = 0;

    function startCountdown(seconds) {
        countdownSeconds = seconds;
        updateCountdownDisplay();

        countdownInterval = setInterval(() => {
            countdownSeconds--;
            updateCountdownDisplay();

            if (countdownSeconds <= 0) {
                stopCountdown();
                // QR Code expired
                document.getElementById('qris-countdown').textContent = '00:00';
                if (typeof showToast === 'function') {
                    showToast('QR Code telah kedaluwarsa. Silakan buat ulang.', 'warning');
                }
            }
        }, 1000);
    }

    function updateCountdownDisplay() {
        const minutes = Math.floor(countdownSeconds / 60);
        const seconds = countdownSeconds % 60;
        const display = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        document.getElementById('qris-countdown').textContent = display;
    }

    function stopCountdown() {
        if (countdownInterval) {
            clearInterval(countdownInterval);
            countdownInterval = null;
        }
        // Reset countdown display
        document.getElementById('qris-countdown').textContent = '15:00';
    }

    function downloadQrisImage() {
        if (!qrisData.qrCodeUrl) {
            if (typeof showToast === 'function') {
                showToast('QR Code tidak tersedia', 'error');
            }
            return;
        }

        // Create a temporary link to download the image
        const link = document.createElement('a');
        link.href = qrisData.qrCodeUrl;
        link.download = `QRIS_${qrisData.orderId || 'payment'}.png`;
        link.target = '_blank';

        // For cross-origin images, open in new tab
        window.open(qrisData.qrCodeUrl, '_blank');

        if (typeof showToast === 'function') {
            showToast('QR Code dibuka di tab baru. Klik kanan untuk menyimpan.', 'info');
        }
    }
</script>
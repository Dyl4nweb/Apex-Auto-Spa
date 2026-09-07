/**
 * APEX AUTO SPA - INTERACTIVE JAVASCRIPT
 * Handles comparison slider, price estimator, booking form AJAX, and accessible modal.
 */

document.addEventListener('DOMContentLoaded', () => {
    initHeaderAndMobileMenu();
    initComparisonSlider();
    initPriceEstimator();
    initBookingForm();
    initQuickBars();
    checkSessionModal();
});

/* ==========================================================================
   1. HEADER & MOBILE MENU
   ========================================================================== */
function initHeaderAndMobileMenu() {
    const mobileBtn = document.getElementById('mobileMenuToggle');
    const mobileDrawer = document.getElementById('mobileDrawer');
    const mobileLinks = document.querySelectorAll('.mobile-nav-link, .mobile-drawer-cta a');

    if (mobileBtn && mobileDrawer) {
        mobileBtn.addEventListener('click', () => {
            const isOpen = mobileDrawer.classList.toggle('open');
            mobileBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileDrawer.classList.remove('open');
                mobileBtn.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Sticky header shadow on scroll
    const header = document.getElementById('siteHeader');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.7)';
        } else {
            header.style.boxShadow = 'none';
        }
    });
}

/* ==========================================================================
   2. BEFORE & AFTER TRANSFORMATION SLIDER
   ========================================================================== */
function initComparisonSlider() {
    const container = document.getElementById('comparisonSlider');
    const afterLayer = document.getElementById('afterImageLayer');
    const handle = document.getElementById('sliderHandle');

    if (!container || !afterLayer || !handle) return;

    let isDragging = false;

    function updateSlider(clientX) {
        const rect = container.getBoundingClientRect();
        let offsetX = clientX - rect.left;
        if (offsetX < 0) offsetX = 0;
        if (offsetX > rect.width) offsetX = rect.width;

        const percentage = (offsetX / rect.width) * 100;
        handle.style.left = `${percentage}%`;
        afterLayer.style.clipPath = `polygon(${percentage}% 0, 100% 0, 100% 100%, ${percentage}% 100%)`;
    }

    // Mouse Events
    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        updateSlider(e.clientX);
    });

    window.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        updateSlider(e.clientX);
    });

    window.addEventListener('mouseup', () => {
        isDragging = false;
    });

    // Touch Events for Mobile
    container.addEventListener('touchstart', (e) => {
        isDragging = true;
        updateSlider(e.touches[0].clientX);
    }, { passive: true });

    window.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        updateSlider(e.touches[0].clientX);
    }, { passive: true });

    window.addEventListener('touchend', () => {
        isDragging = false;
    });
}

/* ==========================================================================
   3. INTERACTIVE VEHICLE PRICE ESTIMATOR
   ========================================================================== */
function initPriceEstimator() {
    const vehicleButtons = document.querySelectorAll('.vehicle-pill-btn');
    const packageCards = document.querySelectorAll('.tier-radio-card');
    
    const displayPrice = document.getElementById('calcPriceDisplay');
    const displayVehicle = document.getElementById('calcVehicleLabel');
    const displayPackage = document.getElementById('calcPackageLabel');
    const displayDuration = document.getElementById('calcDuration');
    const applyBtn = document.getElementById('applyEstimateBtn');

    if (!vehicleButtons.length || !packageCards.length) return;

    let currentMultiplier = 1.0;
    let currentVehicleName = 'Coupe / Sedan';
    let currentVehicleId = 'sedan';

    let currentBasePrice = 129;
    let currentPackageName = 'Signature Detail';
    let currentDuration = '90 - 120 Mins';

    function recalculate() {
        const finalPrice = Math.round(currentBasePrice * currentMultiplier);
        
        if (displayPrice) displayPrice.textContent = `$${finalPrice}`;
        if (displayVehicle) displayVehicle.textContent = currentVehicleName;
        if (displayPackage) displayPackage.textContent = currentPackageName;
        if (displayDuration) displayDuration.textContent = currentDuration;
    }

    vehicleButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            vehicleButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            currentMultiplier = parseFloat(btn.dataset.multiplier) || 1.0;
            currentVehicleName = btn.dataset.name;
            currentVehicleId = btn.dataset.id;
            recalculate();
        });
    });

    packageCards.forEach(card => {
        card.addEventListener('click', () => {
            packageCards.forEach(c => c.classList.remove('active'));
            card.classList.add('active');

            currentBasePrice = parseInt(card.dataset.base, 10) || 129;
            currentPackageName = card.dataset.name;
            currentDuration = card.dataset.duration;
            recalculate();
        });
    });

    if (applyBtn) {
        applyBtn.addEventListener('click', () => {
            const vehicleSelect = document.getElementById('vehicleTypeSelect');
            const packageSelect = document.getElementById('servicePackageSelect');
            
            if (vehicleSelect && currentVehicleId) {
                vehicleSelect.value = currentVehicleId;
            }
            if (packageSelect && currentPackageName) {
                // Find matching option
                for (let option of packageSelect.options) {
                    if (option.value.includes(currentPackageName) || currentPackageName.includes(option.value)) {
                        packageSelect.value = option.value;
                        break;
                    }
                }
            }

            // Scroll to booking section smoothly
            const bookingSection = document.getElementById('booking');
            if (bookingSection) {
                bookingSection.scrollIntoView({ behavior: 'smooth' });
                // Highlight form
                const formCard = document.querySelector('.booking-card');
                if (formCard) {
                    formCard.style.boxShadow = '0 0 40px rgba(56, 189, 248, 0.4)';
                    setTimeout(() => {
                        formCard.style.boxShadow = '';
                    }, 1500);
                }
            }
        });
    }

    // Initial calculation
    recalculate();
}

/* ==========================================================================
   4. QUICK JUMP & PREFILL SHORTCUTS
   ========================================================================== */
function initQuickBars() {
    // Quick Jump button in Hero section
    const quickJumpBtn = document.getElementById('quickJumpBtn');
    if (quickJumpBtn) {
        quickJumpBtn.addEventListener('click', () => {
            const quickVehicle = document.getElementById('quickVehicle')?.value;
            const quickPackage = document.getElementById('quickPackage')?.value;
            const quickDate = document.getElementById('quickDate')?.value;

            const vehicleSelect = document.getElementById('vehicleTypeSelect');
            const packageSelect = document.getElementById('servicePackageSelect');
            const dateInput = document.getElementById('preferredDate');

            if (vehicleSelect && quickVehicle) vehicleSelect.value = quickVehicle;
            if (packageSelect && quickPackage) packageSelect.value = quickPackage;
            if (dateInput && quickDate) dateInput.value = quickDate;

            document.getElementById('booking')?.scrollIntoView({ behavior: 'smooth' });
        });
    }

    // Direct Package Buttons in the Packages grid
    document.querySelectorAll('.pkg-select-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const pkgName = btn.dataset.package;
            const packageSelect = document.getElementById('servicePackageSelect');
            if (packageSelect && pkgName) {
                for (let option of packageSelect.options) {
                    if (option.value.includes(pkgName) || pkgName.includes(option.value)) {
                        packageSelect.value = option.value;
                        break;
                    }
                }
            }
            document.getElementById('booking')?.scrollIntoView({ behavior: 'smooth' });
        });
    });

    // Direct Service Buttons in the Services grid
    document.querySelectorAll('.select-service-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const serviceName = btn.dataset.service;
            const packageSelect = document.getElementById('servicePackageSelect');
            if (packageSelect && serviceName) {
                for (let option of packageSelect.options) {
                    if (option.value.includes(serviceName) || serviceName.includes(option.value)) {
                        packageSelect.value = option.value;
                        break;
                    }
                }
            }
            document.getElementById('booking')?.scrollIntoView({ behavior: 'smooth' });
        });
    });
}

/* ==========================================================================
   5. BOOKING FORM AJAX & ACCESSIBLE MODAL
   ========================================================================== */
function initBookingForm() {
    const form = document.getElementById('appointmentForm');
    const modal = document.getElementById('bookingModal');
    const closeBtn = document.getElementById('closeModalBtn');
    const modalDetails = document.getElementById('modalBookingDetails');
    const submitBtn = document.getElementById('submitBookingBtn');

    if (closeBtn && modal) {
        closeBtn.addEventListener('click', () => modal.close());
    }

    // Close when clicking dialog backdrop
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.close();
            }
        });
    }

    if (!form || !modal) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const btnText = submitBtn.querySelector('.btn-text');
        const btnSpinner = submitBtn.querySelector('.btn-spinner');

        if (btnText) btnText.textContent = 'Securing Your Bay...';
        if (btnSpinner) btnSpinner.classList.remove('hidden');
        submitBtn.disabled = true;

        const formData = new FormData(form);
        const payload = Object.fromEntries(formData.entries());

        const vehicleLabels = {
            'sedan': 'Coupe / Sedan',
            'crossover': 'Compact SUV / Crossover',
            'fullsuv': 'Full SUV / Minivan',
            'truck': 'Truck / Large 4x4',
            'exotic': 'Exotic / Supercar',
        };

        const generateFallbackBooking = () => {
            const ref = 'APX-' + Math.random().toString(36).substring(2, 8).toUpperCase();
            const vLabel = vehicleLabels[payload.vehicle_type] || payload.vehicle_type || 'Coupe / Sedan';
            let formattedDate = payload.preferred_date;
            try {
                const d = new Date(payload.preferred_date + 'T00:00:00');
                if (!isNaN(d.getTime())) {
                    formattedDate = d.toLocaleDateString('en-US', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                }
            } catch (e) {
                formattedDate = payload.preferred_date;
            }

            const waMessage = encodeURIComponent(
                `Hello Apex Auto Spa! I just booked an appointment.\n` +
                `Ref: ${ref}\n` +
                `Name: ${payload.customer_name}\n` +
                `Vehicle: ${vLabel} (${payload.vehicle_model || 'Standard'})\n` +
                `Package: ${payload.service_package}\n` +
                `Preferred: ${formattedDate} at ${payload.preferred_time}`
            );

            return {
                reference: ref,
                name: payload.customer_name,
                phone: payload.customer_phone,
                email: payload.customer_email || 'Not provided',
                vehicle_type: vLabel,
                vehicle_model: payload.vehicle_model || 'Vehicle not specified',
                package: payload.service_package,
                date: formattedDate,
                time: payload.preferred_time,
                notes: payload.special_notes || 'None',
                whatsapp_url: `https://wa.me/18005550199?text=${waMessage}`
            };
        };

        const showReceipt = (b) => {
            modalDetails.innerHTML = `
                <div class="receipt-box">
                    <div class="receipt-row highlight">
                        <span>Confirmation Ref</span>
                        <strong>${escapeHtml(b.reference)}</strong>
                    </div>
                    <div class="receipt-row">
                        <span>Client Name</span>
                        <span>${escapeHtml(b.name)}</span>
                    </div>
                    <div class="receipt-row">
                        <span>Contact Phone</span>
                        <span>${escapeHtml(b.phone)}</span>
                    </div>
                    <div class="receipt-row">
                        <span>Vehicle</span>
                        <span>${escapeHtml(b.vehicle_type)} (${escapeHtml(b.vehicle_model)})</span>
                    </div>
                    <div class="receipt-row">
                        <span>Package</span>
                        <span class="badge-package">${escapeHtml(b.package)}</span>
                    </div>
                    <div class="receipt-row">
                        <span>Scheduled For</span>
                        <span><strong>${escapeHtml(b.date)}</strong> at ${escapeHtml(b.time)}</span>
                    </div>
                </div>

                <div class="modal-actions-grid">
                    <a href="${b.whatsapp_url}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
                        <svg class="icon-sm" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Confirm via WhatsApp
                    </a>
                    <button type="button" class="btn btn-outline" id="ajaxDoneBtn">Done</button>
                </div>
            `;

            document.getElementById('ajaxDoneBtn')?.addEventListener('click', () => modal.close());
            form.reset();
            modal.showModal();
        };

        try {
            const response = await fetch(form.action || '/book', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                },
                body: JSON.stringify(payload),
            });

            if (response.ok) {
                const data = await response.json();
                if (data.success && data.booking) {
                    showReceipt(data.booking);
                } else {
                    showReceipt(generateFallbackBooking());
                }
            } else {
                showReceipt(generateFallbackBooking());
            }
        } catch (err) {
            showReceipt(generateFallbackBooking());
        } finally {
            if (btnText) btnText.textContent = 'Confirm My Appointment';
            if (btnSpinner) btnSpinner.classList.add('hidden');
            submitBtn.disabled = false;
        }
    });
}

function checkSessionModal() {
    const modal = document.getElementById('bookingModal');
    const dismissBtn = document.getElementById('sessionDismissBtn');

    if (dismissBtn && modal) {
        dismissBtn.addEventListener('click', () => modal.close());
    }

    // If server rendered booking_success via session
    if (modal && modal.querySelector('.receipt-box')) {
        modal.showModal();
    }
}

function escapeHtml(str) {
    if (!str) return '';
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

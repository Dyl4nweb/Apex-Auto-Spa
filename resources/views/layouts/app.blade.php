<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apex Auto Spa & Detailing - Premier automotive rejuvenation, 9H ceramic coating, multi-stage paint correction, and luxury hand car wash.">
    <meta name="theme-color" content="#0a0d14">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Apex Auto Spa | Elite Car Wash & Auto Detailing')</title>

    <!-- App Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/carwash.css') }}">
</head>
<body class="bg-carbon text-slate-100 antialiased selection:bg-cyan-500 selection:text-white">

    <!-- Top Announcement Bar -->
    <div class="top-bar">
        <div class="container top-bar-content">
            <div class="top-bar-item">
                <span class="pulse-dot"></span>
                <span class="top-bar-text">Open Today: <strong>8:00 AM – 7:00 PM</strong> • Climate-Controlled Indoor Bays</span>
            </div>
            <div class="top-bar-actions">
                <a href="tel:+18005550199" class="top-bar-link">
                    <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    (800) 555-0199
                </a>
                <span class="divider-v"></span>
                <span class="location-badge">
                    <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    742 Apex Boulevard, Metro City
                </span>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="site-header" id="siteHeader">
        <div class="container header-container">
            <a href="{{ route('home') }}" class="brand-logo" aria-label="Apex Auto Spa Home">
                <div class="logo-icon-wrapper">
                    <svg class="brand-svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-4.66l.12-.34h13.77l.11.34V17z"/>
                        <circle cx="7.5" cy="14.5" r="1.5"/>
                        <circle cx="16.5" cy="14.5" r="1.5"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <span class="brand-name">APEX<span class="brand-accent">AUTO</span></span>
                    <span class="brand-sub">PRECISION SPA & DETAILING</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="desktop-nav" aria-label="Main Navigation">
                <a href="#services" class="nav-link">Services</a>
                <a href="#estimator" class="nav-link">Price Estimator</a>
                <a href="#packages" class="nav-link">Packages</a>
                <a href="#transformation" class="nav-link">Before & After</a>
                <a href="#reviews" class="nav-link">Reviews</a>
                <a href="#faq" class="nav-link">FAQ</a>
                <a href="#location" class="nav-link">Location</a>
            </nav>

            <div class="header-actions">
                <a href="#booking" class="btn btn-primary btn-glow" id="headerBookBtn">
                    <span>Book Appointment</span>
                    <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <!-- Mobile Menu Toggle Button -->
                <button type="button" class="mobile-menu-btn" id="mobileMenuToggle" aria-label="Toggle Menu" aria-expanded="false">
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Navigation -->
        <div class="mobile-drawer" id="mobileDrawer">
            <div class="mobile-drawer-inner">
                <a href="#services" class="mobile-nav-link">Services</a>
                <a href="#estimator" class="mobile-nav-link">Price Estimator</a>
                <a href="#packages" class="mobile-nav-link">Packages</a>
                <a href="#transformation" class="mobile-nav-link">Before & After</a>
                <a href="#reviews" class="mobile-nav-link">Reviews</a>
                <a href="#faq" class="mobile-nav-link">FAQ</a>
                <a href="#location" class="mobile-nav-link">Location & Hours</a>
                <div class="mobile-drawer-cta">
                    <a href="#booking" class="btn btn-primary w-full text-center">Book Appointment</a>
                    <a href="tel:+18005550199" class="btn btn-outline w-full text-center mt-2">Call (800) 555-0199</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Page Content -->
    <main id="mainContent">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand-col">
                <div class="footer-logo">
                    <span class="brand-name">APEX<span class="brand-accent">AUTO</span></span>
                    <span class="brand-sub">PRECISION SPA & DETAILING</span>
                </div>
                <p class="footer-bio">
                    Metro City’s highest-rated automotive aesthetic studio. Specializing in certified 9H ceramic coatings, multi-stage swirl removal, and bespoke luxury interior preservation.
                </p>
                <div class="footer-badges">
                    <div class="cert-pill">IDA Certified Detailer</div>
                    <div class="cert-pill">XPEL & Ceramic Pro Trained</div>
                </div>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Services</h4>
                <ul class="footer-links">
                    <li><a href="#services">Ceramic Paint Coating</a></li>
                    <li><a href="#services">Paint Swirl Correction</a></li>
                    <li><a href="#services">Deep Leather Extraction</a></li>
                    <li><a href="#services">Hand Snow Foam Wash</a></li>
                    <li><a href="#services">Engine Bay Detailing</a></li>
                    <li><a href="#services">Headlight Crystal Restoration</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Packages</h4>
                <ul class="footer-links">
                    <li><a href="#packages">Express Refresh ($39)</a></li>
                    <li><a href="#packages">Signature Detail ($129)</a></li>
                    <li><a href="#packages">Platinum Ceramic ($349)</a></li>
                    <li><a href="#estimator">Interactive Calculator</a></li>
                    <li><a href="#booking">Fleet & Corporate Plans</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Shop Hours</h4>
                <ul class="hours-list">
                    <li><span>Monday – Friday:</span> <strong>8:00 AM – 7:00 PM</strong></li>
                    <li><span>Saturday:</span> <strong>8:00 AM – 6:00 PM</strong></li>
                    <li><span>Sunday:</span> <strong>9:00 AM – 5:00 PM</strong></li>
                </ul>
                <div class="footer-contact-box">
                    <p><strong>Direct Hotline:</strong> (800) 555-0199</p>
                    <p><strong>Address:</strong> 742 Apex Blvd, Metro City</p>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom-flex">
                <p>&copy; {{ date('Y') }} Apex Auto Spa & Detailing Inc. All rights reserved. • Developed by <a href="https://dylanramos.vercel.app" target="_blank" rel="noopener noreferrer" class="developer-credit">Dylan Ramos</a></p>
                <div class="footer-legal">
                    <span>100% Satisfaction Guarantee</span>
                    <span>•</span>
                    <span>Eco-Friendly Water Reclamation</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Global Floating Quick Action Button -->
    <a href="#booking" class="floating-quick-book" id="floatingBookBtn" aria-label="Quick Book Now">
        <svg class="icon-md" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        <span>Instant Book</span>
    </a>

    <!-- Confirmation Modal Component (Accessible HTML5 Dialog) -->
    <dialog id="bookingModal" class="booking-dialog" closedby="any">
        <div class="modal-card">
            <div class="modal-header">
                <div class="modal-icon-success">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <div>
                    <h3 class="modal-title" id="modalTitle">Appointment Reserved!</h3>
                    <p class="modal-sub">We’ve locked in your requested detailing slot.</p>
                </div>
                <button type="button" class="modal-close-btn" id="closeModalBtn" aria-label="Close dialog">&times;</button>
            </div>
            
            <div class="modal-body" id="modalBookingDetails">
                <!-- Injected dynamically via JS or filled via Session -->
                @if(session('booking_success'))
                    @php $b = session('booking_success'); @endphp
                    <div class="receipt-box">
                        <div class="receipt-row highlight">
                            <span>Confirmation Ref</span>
                            <strong>{{ $b['reference'] }}</strong>
                        </div>
                        <div class="receipt-row">
                            <span>Client Name</span>
                            <span>{{ $b['name'] }}</span>
                        </div>
                        <div class="receipt-row">
                            <span>Contact Phone</span>
                            <span>{{ $b['phone'] }}</span>
                        </div>
                        <div class="receipt-row">
                            <span>Vehicle</span>
                            <span>{{ $b['vehicle_type'] }} ({{ $b['vehicle_model'] }})</span>
                        </div>
                        <div class="receipt-row">
                            <span>Package</span>
                            <span class="badge-package">{{ $b['package'] }}</span>
                        </div>
                        <div class="receipt-row">
                            <span>Scheduled For</span>
                            <span><strong>{{ $b['date'] }}</strong> at {{ $b['time'] }}</span>
                        </div>
                    </div>

                    <div class="modal-actions-grid">
                        <a href="{{ $b['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
                            <svg class="icon-sm" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            Confirm via WhatsApp
                        </a>
                        <button type="button" class="btn btn-outline" id="sessionDismissBtn">Done</button>
                    </div>
                @endif
            </div>
        </div>
    </dialog>

    <!-- Scripts -->
    <script src="{{ asset('js/carwash.js') }}"></script>
</body>
</html>

@extends('layouts.app')

@section('title', 'Apex Auto Spa | Elite Car Wash & Auto Detailing Studio')

@section('content')

    <!-- =========================================================================
         1. HERO SECTION
    ========================================================================== -->
    <section class="hero-section" id="hero">
        <div class="hero-ambient-glow hero-glow-1"></div>
        <div class="hero-ambient-glow hero-glow-2"></div>
        <div class="hero-grid-pattern"></div>

        <div class="container hero-content">
            <div class="hero-badge">
                <span class="badge-icon">⚡</span>
                <span>Metro City’s Premier Ceramic & Detailing Facility</span>
            </div>

            <h1 class="hero-title">
                Flawless Shine. <span class="gradient-text">Precision Care.</span><br>
                Unrivaled Protection.
            </h1>

            <p class="hero-description">
                Elevate your driving experience with concours-grade paint correction, hospital-grade interior steam sanitation, and certified 9H ceramic glass shielding. Zero corners cut.
            </p>

            <div class="hero-cta-group">
                <a href="#booking" class="btn btn-primary btn-lg btn-glow">
                    <span>Reserve Your Bay</span>
                    <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#estimator" class="btn btn-secondary btn-lg">
                    <span>Calculate Price</span>
                    <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                </a>
            </div>

            <!-- Social Proof Bar -->
            <div class="hero-social-proof">
                <div class="rating-stars">
                    <span class="star-icon">★</span>
                    <span class="star-icon">★</span>
                    <span class="star-icon">★</span>
                    <span class="star-icon">★</span>
                    <span class="star-icon">★</span>
                </div>
                <div class="rating-text">
                    <strong>4.9 / 5 Rating</strong> &nbsp;•&nbsp; Over 1,200+ Verified Car Enthusiasts & Daily Drivers
                </div>
            </div>

            <!-- Quick Reservation Jump Bar -->
            <div class="quick-bar-card glass-panel">
                <div class="quick-bar-grid">
                    <div class="quick-bar-field">
                        <label for="quickVehicle">Vehicle Class</label>
                        <select id="quickVehicle" class="quick-select">
                            <option value="sedan">Coupe / Sedan</option>
                            <option value="crossover">Compact SUV / Crossover</option>
                            <option value="fullsuv">Full SUV / Minivan</option>
                            <option value="truck">Truck / Full-size 4x4</option>
                            <option value="exotic">Exotic / Supercar</option>
                        </select>
                    </div>

                    <div class="quick-bar-field">
                        <label for="quickPackage">Desired Package</label>
                        <select id="quickPackage" class="quick-select">
                            <option value="Signature Detail">Signature Detail ($129)</option>
                            <option value="Express Refresh">Express Refresh ($39)</option>
                            <option value="Platinum Ceramic & Spa">Platinum Ceramic & Spa ($349)</option>
                        </select>
                    </div>

                    <div class="quick-bar-field">
                        <label for="quickDate">Preferred Date</label>
                        <input type="date" id="quickDate" class="quick-select" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                    </div>

                    <div class="quick-bar-action">
                        <button type="button" class="btn btn-primary w-full" id="quickJumpBtn">
                            Lock In Slot
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Ribbon -->
            <div class="hero-stats-grid">
                @foreach($stats as $stat)
                    <div class="stat-card">
                        <div class="stat-value">{{ $stat['value'] }}</div>
                        <div class="stat-label">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================================
         2. BEFORE & AFTER TRANSFORMATION SHOWCASE (Interactive Drag Slider)
    ========================================================================== -->
    <section class="section bg-charcoal" id="transformation">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge">Visual Proof</span>
                <h2 class="section-title">The Apex Transformation</h2>
                <p class="section-subtitle">
                    Drag the slider below to reveal the contrast between severe paint swirls and our multi-stage precision machine correction.
                </p>
            </div>

            <div class="transformation-wrapper">
                <div class="comparison-container" id="comparisonSlider">
                    <!-- Before Image Container (Swirls / Dull Paint) -->
                    <div class="comparison-image image-before">
                        <div class="car-render-plate before-plate">
                            <div class="paint-swirls-overlay"></div>
                            <div class="render-details">
                                <div class="car-silhouette">
                                    <div class="car-hood-accent"></div>
                                </div>
                                <span class="state-pill state-before">BEFORE: Dull Paint, Holograms & Heavy Swirls</span>
                            </div>
                        </div>
                    </div>

                    <!-- After Image Container (Mirror Ceramic Gloss) -->
                    <div class="comparison-image image-after" id="afterImageLayer">
                        <div class="car-render-plate after-plate">
                            <div class="paint-gloss-overlay"></div>
                            <div class="render-details">
                                <div class="car-silhouette mirror-shine">
                                    <div class="car-hood-accent gloss"></div>
                                </div>
                                <span class="state-pill state-after">AFTER: 9H Ceramic Coating & Mirror Gloss</span>
                            </div>
                        </div>
                    </div>

                    <!-- Drag Handle Handlebar -->
                    <div class="comparison-handle" id="sliderHandle">
                        <div class="handle-line"></div>
                        <div class="handle-circle">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18-6-6 6-6M15 6l6 6-6 6"/></svg>
                        </div>
                        <div class="handle-line"></div>
                    </div>
                </div>

                <div class="comparison-footer-info">
                    <div class="feat-bullet">
                        <span class="check-dot">✓</span> 90%+ Paint Swirl & Oxidation Eradication
                    </div>
                    <div class="feat-bullet">
                        <span class="check-dot">✓</span> Intense Depth of Color & Hydrophobic Self-Cleaning
                    </div>
                    <div class="feat-bullet">
                        <span class="check-dot">✓</span> Safe on Clear Coats, Carbon Fiber & Matte Finishes
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         3. INTERACTIVE VEHICLE PRICE ESTIMATOR
    ========================================================================== -->
    <section class="section" id="estimator">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge">Instant Quote</span>
                <h2 class="section-title">Transparent Price Estimator</h2>
                <p class="section-subtitle">
                    Select your vehicle class and package tier to see instant, transparent pricing with no hidden shop fees.
                </p>
            </div>

            <div class="estimator-card glass-panel">
                <!-- Vehicle Selector Step -->
                <div class="estimator-step">
                    <label class="step-label">Step 1: Choose Your Vehicle Type</label>
                    <div class="vehicle-options-grid" id="vehicleGrid">
                        @foreach($vehicleTypes as $index => $v)
                            <button type="button" 
                                    class="vehicle-pill-btn {{ $index === 0 ? 'active' : '' }}" 
                                    data-id="{{ $v['id'] }}" 
                                    data-multiplier="{{ $v['multiplier'] }}"
                                    data-name="{{ $v['name'] }}">
                                <div class="vehicle-icon-box">
                                    @if($v['id'] === 'sedan')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9L2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>
                                    @elseif($v['id'] === 'crossover' || $v['id'] === 'fullsuv')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M19 17h2c.6 0 1-.4 1-1v-4c0-.6-.3-1.2-.8-1.5L16 7.5c-.3-.2-.7-.5-1.2-.5H5c-.6 0-1.1.4-1.4.9L2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>
                                    @elseif($v['id'] === 'truck')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 17h7c.6 0 1-.4 1-1v-4c0-.6-.4-1-1-1h-2l-2-4H5c-.6 0-1 .4-1 1v8c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>
                                    @else
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 17h3c.6 0 1-.4 1-1v-2l-3-4h-5l-2-2H5c-.6 0-1 .4-1 1v7c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>
                                    @endif
                                </div>
                                <span class="vehicle-title">{{ $v['name'] }}</span>
                                <span class="vehicle-hint">{{ $v['example'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Package Selector Step -->
                <div class="estimator-step mt-6">
                    <label class="step-label">Step 2: Choose Service Tier</label>
                    <div class="estimator-packages-grid" id="estimatorPackages">
                        <button type="button" class="tier-radio-card" data-base="39" data-name="Express Refresh" data-duration="30 - 45 Mins">
                            <div class="tier-radio-head">
                                <span class="tier-name">Express Refresh</span>
                                <span class="tier-tag">Base $39</span>
                            </div>
                            <p class="tier-desc">Snow foam wash, satin tire dressing, exterior glass, and interior floor vacuum.</p>
                        </button>

                        <button type="button" class="tier-radio-card active" data-base="129" data-name="Signature Detail" data-duration="90 - 120 Mins">
                            <div class="tier-radio-head">
                                <span class="tier-name">Signature Detail</span>
                                <span class="tier-tag popular">Most Popular</span>
                            </div>
                            <p class="tier-desc">Decontamination clay bar, full steam extraction, leather conditioning, 3-mo sealant.</p>
                        </button>

                        <button type="button" class="tier-radio-card" data-base="349" data-name="Platinum Ceramic & Spa" data-duration="3.5 - 5 Hours">
                            <div class="tier-radio-head">
                                <span class="tier-name">Platinum Ceramic</span>
                                <span class="tier-tag">Concourse</span>
                            </div>
                            <p class="tier-desc">2-stage machine swirl correction, 3-yr 9H ceramic coating, engine bay steam.</p>
                        </button>
                    </div>
                </div>

                <!-- Estimator Output Box -->
                <div class="estimator-result-banner">
                    <div class="result-details">
                        <div class="result-vehicle" id="calcVehicleLabel">Coupe / Sedan</div>
                        <div class="result-package" id="calcPackageLabel">Signature Detail</div>
                        <div class="result-duration">
                            <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Turnaround Time: <strong id="calcDuration">90 - 120 Mins</strong>
                        </div>
                    </div>

                    <div class="result-pricing">
                        <span class="estimate-sub">Estimated Investment</span>
                        <div class="estimate-price" id="calcPriceDisplay">$129</div>
                        <span class="estimate-note">All taxes & supplies included</span>
                    </div>

                    <div class="result-cta">
                        <button type="button" class="btn btn-primary btn-glow" id="applyEstimateBtn">
                            Book This Configuration
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         4. CORE SERVICES SHOWCASE
    ========================================================================== -->
    <section class="section bg-charcoal" id="services">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge">Master Craftsmanship</span>
                <h2 class="section-title">Specialized Detailing Services</h2>
                <p class="section-subtitle">
                    Each service is executed using certified professional chemical formulations, dual-action rotary polishers, and de-ionized water.
                </p>
            </div>

            <div class="services-grid">
                @foreach($services as $s)
                    <div class="service-card glass-panel">
                        <div class="service-top">
                            <span class="service-badge">{{ $s['badge'] }}</span>
                            <div class="service-meta">
                                <span class="service-duration">{{ $s['duration'] }}</span>
                                <span class="service-price">{{ $s['price'] }}</span>
                            </div>
                        </div>

                        <h3 class="service-title">{{ $s['title'] }}</h3>
                        <p class="service-description">{{ $s['description'] }}</p>

                        <div class="service-divider"></div>

                        <ul class="service-feature-list">
                            @foreach($s['features'] as $f)
                                <li>
                                    <svg class="icon-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    <span>{{ $f }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <button type="button" class="btn btn-outline-sm w-full select-service-btn" data-service="{{ $s['title'] }}">
                            Select Service
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================================
         5. PACKAGE PRICING TIERS
    ========================================================================== -->
    <section class="section" id="packages">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge">Package Plans</span>
                <h2 class="section-title">All-Inclusive Detail Packages</h2>
                <p class="section-subtitle">
                    Select the ideal maintenance routine for your car. Upgrade or customize at any time.
                </p>
            </div>

            <div class="packages-grid">
                @foreach($packages as $pkg)
                    <div class="package-card glass-panel {{ $pkg['popular'] ? 'package-card-featured' : '' }}">
                        @if($pkg['popular'])
                            <div class="featured-badge">MOST POPULAR</div>
                        @endif

                        <div class="pkg-header">
                            <h3 class="pkg-name">{{ $pkg['name'] }}</h3>
                            <p class="pkg-tagline">{{ $pkg['tagline'] }}</p>
                        </div>

                        <div class="pkg-price-wrap">
                            <span class="currency">$</span>
                            <span class="amount">{{ $pkg['price'] }}</span>
                            <span class="period">/ starting base</span>
                        </div>

                        <div class="pkg-duration-pill">
                            <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Approx. {{ $pkg['duration'] }}
                        </div>

                        <div class="pkg-divider"></div>

                        <ul class="pkg-list">
                            @foreach($pkg['highlights'] as $highlight)
                                <li>
                                    <svg class="icon-check-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    <span>{{ $highlight }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <button type="button" 
                                class="btn {{ $pkg['popular'] ? 'btn-primary btn-glow' : 'btn-secondary' }} w-full pkg-select-btn" 
                                data-package="{{ $pkg['name'] }}">
                            Choose {{ $pkg['name'] }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================================
         6. INTERACTIVE APPOINTMENT BOOKING / QUOTE FORM (No Database)
    ========================================================================== -->
    <section class="section bg-charcoal" id="booking">
        <div class="container">
            <div class="booking-split-layout">
                <div class="booking-info-col">
                    <span class="section-badge">Zero Friction</span>
                    <h2 class="section-title text-left">Book Your Detail in 60 Seconds</h2>
                    <p class="section-subtitle text-left">
                        Reserve your bay online. We confirm every appointment with an instant confirmation code and text confirmation. No advance credit card required.
                    </p>

                    <div class="perks-list">
                        <div class="perk-item">
                            <div class="perk-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            </div>
                            <div>
                                <h4 class="perk-title">100% Satisfaction Guarantee</h4>
                                <p class="perk-desc">If you spot any imperfection, we re-clean and correct it before your vehicle rolls out.</p>
                            </div>
                        </div>

                        <div class="perk-item">
                            <div class="perk-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                            </div>
                            <div>
                                <h4 class="perk-title">Filtered De-ionized Water Only</h4>
                                <p class="perk-desc">Zero calcium streaks, zero abrasive swirl risk, 100% paint-safe.</p>
                            </div>
                        </div>

                        <div class="perk-item">
                            <div class="perk-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                            </div>
                            <div>
                                <h4 class="perk-title">Pay On Completion</h4>
                                <p class="perk-desc">Inspect your car in person under our LED studio lights before payment.</p>
                            </div>
                        </div>
                    </div>

                    <div class="phone-callout-card glass-panel">
                        <div class="phone-icon-circle">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <span class="phone-label">Prefer to schedule over the phone?</span>
                            <a href="tel:+18005550199" class="phone-number">(800) 555-0199</a>
                            <span class="phone-sub">Dispatch desk available 7 days a week</span>
                        </div>
                    </div>
                </div>

                <!-- Booking Form Column -->
                <div class="booking-form-col">
                    <div class="booking-card glass-panel">
                        <div class="booking-card-head">
                            <h3 class="form-title">Reserve Detailing Bay</h3>
                            <span class="form-sub">Instant Booking • Instant Confirmation Ref</span>
                        </div>

                        @if ($errors->any())
                            <div class="alert-error">
                                <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                <div>
                                    <strong>Please review the form:</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('book.appointment') }}" method="POST" id="appointmentForm" class="appointment-form">
                            @csrf

                            <div class="form-row-2">
                                <div class="form-group">
                                    <label for="customerName" class="form-label">Your Full Name <span class="required">*</span></label>
                                    <input type="text" 
                                           name="customer_name" 
                                           id="customerName" 
                                           class="form-control" 
                                           placeholder="e.g. Alex Morgan" 
                                           value="{{ old('customer_name') }}" 
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="customerPhone" class="form-label">Phone Number <span class="required">*</span></label>
                                    <input type="tel" 
                                           name="customer_phone" 
                                           id="customerPhone" 
                                           class="form-control" 
                                           placeholder="(555) 000-0000" 
                                           value="{{ old('customer_phone') }}" 
                                           required>
                                </div>
                            </div>

                            <div class="form-row-2">
                                <div class="form-group">
                                    <label for="customerEmail" class="form-label">Email Address (Optional)</label>
                                    <input type="email" 
                                           name="customer_email" 
                                           id="customerEmail" 
                                           class="form-control" 
                                           placeholder="alex@example.com" 
                                           value="{{ old('customer_email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="vehicleTypeSelect" class="form-label">Vehicle Type <span class="required">*</span></label>
                                    <select name="vehicle_type" id="vehicleTypeSelect" class="form-control" required>
                                        <option value="sedan">Coupe / Sedan</option>
                                        <option value="crossover">Compact SUV / Crossover</option>
                                        <option value="fullsuv">Full SUV / Minivan</option>
                                        <option value="truck">Truck / Large 4x4</option>
                                        <option value="exotic">Exotic / Supercar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row-2">
                                <div class="form-group">
                                    <label for="vehicleModel" class="form-label">Vehicle Make / Model</label>
                                    <input type="text" 
                                           name="vehicle_model" 
                                           id="vehicleModel" 
                                           class="form-control" 
                                           placeholder="e.g. 2024 BMW M3 Black" 
                                           value="{{ old('vehicle_model') }}">
                                </div>

                                <div class="form-group">
                                    <label for="servicePackageSelect" class="form-label">Service Package <span class="required">*</span></label>
                                    <select name="service_package" id="servicePackageSelect" class="form-control" required>
                                        <option value="Signature Detail">Signature Detail ($129)</option>
                                        <option value="Express Refresh">Express Refresh ($39)</option>
                                        <option value="Platinum Ceramic & Spa">Platinum Ceramic & Spa ($349)</option>
                                        <option value="Ceramic Coating & Paint Correction">Ceramic Coating & Paint Correction</option>
                                        <option value="Master Interior Restoration">Master Interior Restoration</option>
                                        <option value="Engine Bay & Chassis Detailing">Engine Bay Detailing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row-2">
                                <div class="form-group">
                                    <label for="preferredDate" class="form-label">Preferred Date <span class="required">*</span></label>
                                    <input type="date" 
                                           name="preferred_date" 
                                           id="preferredDate" 
                                           class="form-control" 
                                           value="{{ old('preferred_date', date('Y-m-d')) }}" 
                                           min="{{ date('Y-m-d') }}" 
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="preferredTime" class="form-label">Preferred Arrival Time <span class="required">*</span></label>
                                    <select name="preferred_time" id="preferredTime" class="form-control" required>
                                        <option value="08:30 AM (Morning Early Slot)">08:30 AM (Early Bird)</option>
                                        <option value="10:30 AM (Mid-Morning)">10:30 AM (Mid-Morning)</option>
                                        <option value="01:00 PM (Early Afternoon)">01:00 PM (Early Afternoon)</option>
                                        <option value="03:30 PM (Late Afternoon)">03:30 PM (Late Afternoon)</option>
                                        <option value="05:30 PM (Evening Quick)">05:30 PM (Evening Quick)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="specialNotes" class="form-label">Special Inquiries or Paint Concerns</label>
                                <textarea name="special_notes" 
                                          id="specialNotes" 
                                          rows="3" 
                                          class="form-control" 
                                          placeholder="e.g. Needs pet hair removal in backseat, or heavy tree sap on hood...">{{ old('special_notes') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-glow w-full" id="submitBookingBtn">
                                <span class="btn-text">Confirm My Appointment</span>
                                <span class="btn-spinner hidden"></span>
                                <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </button>

                            <p class="form-disclaimer">
                                🔒 Your information is confidential. We will send an SMS reminder 2 hours prior to arrival.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         7. CUSTOMER REVIEWS & TESTIMONIALS
    ========================================================================== -->
    <section class="section" id="reviews">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge">Real Experiences</span>
                <h2 class="section-title">Endorsed by Automotive Perfectionists</h2>
                <p class="section-subtitle">
                    See what sports car owners, luxury drivers, and daily commuters say about our work.
                </p>
            </div>

            <div class="testimonials-grid">
                @foreach($testimonials as $t)
                    <div class="review-card glass-panel">
                        <div class="review-head">
                            <div class="review-author">
                                <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}" class="author-avatar" loading="lazy" width="48" height="48">
                                <div>
                                    <h4 class="author-name">{{ $t['name'] }}</h4>
                                    <span class="author-vehicle">{{ $t['role'] }}</span>
                                </div>
                            </div>
                            <div class="verified-badge">
                                <svg class="icon-xs" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                Verified Client
                            </div>
                        </div>

                        <div class="review-rating">
                            @for($i = 0; $i < $t['rating']; $i++)
                                <span class="star-icon">★</span>
                            @endfor
                        </div>

                        <p class="review-quote">"{{ $t['quote'] }}"</p>

                        <div class="review-service-pill">
                            <span>Service: <strong>{{ $t['service'] }}</strong></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================================
         8. FAQ ACCORDION SECTION
    ========================================================================== -->
    <section class="section bg-charcoal" id="faq">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge">Answers & Clarity</span>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">
                    Everything you need to know about our products, techniques, and appointment policies.
                </p>
            </div>

            <div class="faq-container">
                @foreach($faqs as $index => $faq)
                    <details class="faq-item glass-panel" {{ $index === 0 ? 'open' : '' }}>
                        <summary class="faq-question">
                            <span>{{ $faq['q'] }}</span>
                            <span class="faq-icon-arrow"></span>
                        </summary>
                        <div class="faq-answer">
                            <p>{{ $faq['a'] }}</p>
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================================
         9. LOCATION & SHOP AMENITIES
    ========================================================================== -->
    <section class="section" id="location">
        <div class="container">
            <div class="location-card glass-panel">
                <div class="location-grid">
                    <div class="location-details">
                        <span class="section-badge">Visit Our Studio</span>
                        <h2 class="location-title">742 Apex Boulevard, Metro City</h2>
                        <p class="location-desc">
                            Conveniently situated off Exit 14 with wide, curbless bay entries suitable for lowered sports cars and full-size trucks.
                        </p>

                        <div class="amenities-grid">
                            <div class="amenity-item">
                                <span class="amenity-icon">☕</span>
                                <span>High-Speed Wi-Fi & Lounge</span>
                            </div>
                            <div class="amenity-item">
                                <span class="amenity-icon">🏎️</span>
                                <span>Glass Viewing Gallery</span>
                            </div>
                            <div class="amenity-item">
                                <span class="amenity-icon">🛡️</span>
                                <span>24/7 Monitored Indoor Storage</span>
                            </div>
                            <div class="amenity-item">
                                <span class="amenity-icon">⚡</span>
                                <span>Complimentary EV Charging</span>
                            </div>
                        </div>

                        <div class="location-ctas">
                            <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                                <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
                                Open in Google Maps
                            </a>
                            <a href="#booking" class="btn btn-primary btn-glow">
                                Book Your Slot Now
                            </a>
                        </div>
                    </div>

                    <div class="location-visual">
                        <div class="studio-mockup-frame">
                            <div class="studio-status-tag">
                                <span class="pulse-dot"></span> Bay 1 & Bay 2 Detailing Active
                            </div>
                            <div class="studio-interior-art">
                                <div class="overhead-led-lights">
                                    <span class="led-bar"></span>
                                    <span class="led-bar"></span>
                                    <span class="led-bar"></span>
                                </div>
                                <div class="studio-car-silhouette"></div>
                                <div class="studio-floor-reflection"></div>
                            </div>
                            <div class="studio-caption">
                                <strong>Apex Studio Facility:</strong> Dual climate-controlled clean bays with high-CRI color inspection lighting.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

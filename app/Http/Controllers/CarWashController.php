<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarWashController extends Controller
{
    /**
     * Display the car wash and auto detailing landing page.
     */
    public function index(): View
    {
        $services = [
            [
                'id' => 'ceramic',
                'title' => 'Ceramic Coating & Paint Correction',
                'badge' => 'Premium Protection',
                'description' => 'Multi-stage paint correction removing 90%+ swirls followed by 9H ultra-hydrophobic ceramic glass coating with 3 to 5-year warranty.',
                'price' => '$349+',
                'duration' => '3 - 5 Hours',
                'icon' => 'sparkles',
                'features' => [
                    'Dual-action machine swirl & scratch removal',
                    '9H ultra-dense ceramic SiO2 bond',
                    'Extreme water beading & UV sun shield',
                    'Complimentary 1-year annual top-up inspection',
                ],
            ],
            [
                'id' => 'interior',
                'title' => 'Master Interior Restoration',
                'badge' => 'Deep Sanitized',
                'description' => 'Hospital-grade steam extraction, leather conditioning, ozone odor neutralization, and stain eradication for a showroom-new cabin feel.',
                'price' => '$119+',
                'duration' => '1.5 - 2.5 Hours',
                'icon' => 'car-seat',
                'features' => [
                    'High-temperature hot water & steam extraction',
                    'Leather pH-balanced cleansing & conditioning',
                    'Dashboard, vents, crevices UV matte dressing',
                    'Pet hair extraction & anti-allergen deodorizer',
                ],
            ],
            [
                'id' => 'exterior',
                'title' => 'Signature Hand Wash & Decontamination',
                'badge' => 'Most Popular',
                'description' => 'Two-bucket hand wash with pH-neutral snow foam, iron fallout chemical decontamination, synthetic clay bar, and high-gloss polymer sealant.',
                'price' => '$49+',
                'duration' => '45 - 60 Mins',
                'icon' => 'droplet',
                'features' => [
                    'Thick foam cannon pre-wash & scratch-free wash mitts',
                    'Iron fallout remover & clay bar glass smoothness',
                    'Deep wheel face & inner barrel brake dust scrub',
                    'Tire satin dressing & streak-free crystal glass',
                ],
            ],
            [
                'id' => 'engine',
                'title' => 'Engine Bay & Chassis Detailing',
                'badge' => 'Specialized',
                'description' => 'Safe low-pressure steam cleaning of engine compartment, sensitive electronics shielding, and heat-resistant dressing.',
                'price' => '$79+',
                'duration' => '45 Mins',
                'icon' => 'engine',
                'features' => [
                    'Alternator & intake electronic protection',
                    'Heavy grease & oil grime degreaser breakdown',
                    'OEM satin matte finish (non-greasy)',
                    'Undercarriage high-pressure salt & road film blast',
                ],
            ],
            [
                'id' => 'headlight',
                'title' => 'Headlight UV Restoration & Clarity',
                'badge' => 'Safety & Style',
                'description' => 'Wet sanding oxidation removal, precision compounding, and ceramic UV cured sealant restoring 100% optical night vision.',
                'price' => '$69+',
                'duration' => '30 Mins',
                'icon' => 'lightbulb',
                'features' => [
                    'Restores cloudy, yellowed lenses to optical clear',
                    '3-stage wet-sanding & compounding',
                    'UV anti-yellowing polymer protection seal',
                    'Increases night driving beam visibility by 40%',
                ],
            ],
            [
                'id' => 'fleet',
                'title' => 'Executive Fleet & VIP Membership',
                'badge' => 'Commercial / Club',
                'description' => 'Priority scheduling, recurring bi-weekly detailing routines, and custom corporate packages for luxury & fleet vehicles.',
                'price' => '$189/mo',
                'duration' => 'Custom Schedule',
                'icon' => 'shield-check',
                'features' => [
                    'Unlimited express washes + bi-weekly hand detail',
                    'Priority express turnaround & dedicated bay',
                    'Complimentary pick-up & drop-off service',
                    '20% off all ceramic coatings & paint corrections',
                ],
            ],
        ];

        $packages = [
            [
                'name' => 'Express Refresh',
                'tagline' => 'Essential weekly care for on-the-go professionals',
                'price' => 39,
                'popular' => false,
                'duration' => '30 - 45 Mins',
                'highlights' => [
                    'Snow foam pre-soak & two-bucket hand wash',
                    'Wheel face cleaning & satin tire shine',
                    'Exterior streak-free glass treatment',
                    'Interior express floor vacuum & console dusting',
                    'Hydrophobic spray sealant (3-week shine)',
                ],
            ],
            [
                'name' => 'Signature Detail',
                'tagline' => 'Complete rejuvenation inside and out — our flagship package',
                'price' => 129,
                'popular' => true,
                'badge' => 'Most Requested',
                'duration' => '90 - 120 Mins',
                'highlights' => [
                    'Everything in Express Refresh',
                    'Iron fallout chemical decontamination + clay bar',
                    'Full carpet, upholstery & trunk steam extraction',
                    'Leather seat cleanse & UV rich conditioner',
                    'Carnauba paste wax + 3-month paint sealant',
                    'Deep wheel barrel & brake caliper scrubbing',
                    'Door jambs, trunk sill, and air vent detailing',
                ],
            ],
            [
                'name' => 'Platinum Ceramic & Spa',
                'tagline' => 'The ultimate concours-level perfection and long-term protection',
                'price' => 349,
                'popular' => false,
                'duration' => '3.5 - 5 Hours',
                'highlights' => [
                    'Everything in Signature Detail',
                    '2-Stage paint correction (scratches & swirls removal)',
                    '3-Year 9H ceramic glass coating application',
                    'Full engine bay steam clean & satin dressing',
                    'Windshield & window ceramic rain repellent barrier',
                    'Ozone antimicrobial sanitization & odor destruction',
                    'Complimentary first 6-month checkup and reload spray',
                ],
            ],
        ];

        $vehicleTypes = [
            [
                'id' => 'sedan',
                'name' => 'Coupe / Sedan',
                'multiplier' => 1.0,
                'icon' => 'sedan',
                'example' => 'Civic, BMW 3/5, Camry, Tesla Model 3',
            ],
            [
                'id' => 'crossover',
                'name' => 'Compact SUV / Crossover',
                'multiplier' => 1.15,
                'icon' => 'suv-compact',
                'example' => 'RAV4, Model Y, Audi Q5, CR-V',
            ],
            [
                'id' => 'fullsuv',
                'name' => 'Full SUV / Minivan',
                'multiplier' => 1.30,
                'icon' => 'suv-large',
                'example' => 'Tahoe, Explorer, Sienna, Range Rover',
            ],
            [
                'id' => 'truck',
                'name' => 'Truck / Large 4x4',
                'multiplier' => 1.40,
                'icon' => 'truck',
                'example' => 'F-150, Silverado, Ram 1500, Tacoma',
            ],
            [
                'id' => 'exotic',
                'name' => 'Exotic / Performance',
                'multiplier' => 1.50,
                'icon' => 'sports',
                'example' => 'Porsche 911, Ferrari, Corvette, AMG GT',
            ],
        ];

        $testimonials = [
            [
                'name' => 'Marcus Vance',
                'role' => 'Porsche 911 GT3 Owner',
                'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
                'rating' => 5,
                'quote' => 'I am extraordinarily particular about my paint. Apex took my track car with heavy rubber marks and micro-swirls, and handed back a literal mirror finish. The ceramic water beading is surreal.',
                'service' => 'Platinum Ceramic & 2-Stage Paint Correction',
            ],
            [
                'name' => 'Elena Rostova',
                'role' => 'Range Rover Sport',
                'avatar' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=150&auto=format&fit=crop&q=80',
                'rating' => 5,
                'quote' => 'Two kids and a golden retriever wrecked my cream leather interior. Apex brought it back to day-one showroom state. Smells completely fresh and zero sticky chemical residue.',
                'service' => 'Master Interior Restoration',
            ],
            [
                'name' => 'David Sterling',
                'role' => 'Tesla Model S Plaid',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80',
                'rating' => 5,
                'quote' => 'Fast, courteous, and obsessive attention to detail. From the wheel calipers to the climate vents, not a speck was overlooked. Best auto spa in town by far.',
                'service' => 'Signature Detail Package',
            ],
        ];

        $faqs = [
            [
                'q' => 'How long does a detailing appointment take?',
                'a' => 'Our Express Refresh takes approximately 30 to 45 minutes. The Signature Detail takes 90 to 120 minutes, while multi-stage paint correction and ceramic coatings typically require 3.5 to 5 hours depending on paint condition and cure requirements.',
            ],
            [
                'q' => 'What makes Ceramic Coating superior to standard wax?',
                'a' => 'Traditional carnauba wax washes off within 4 to 8 weeks in rain and heat. Ceramic coating forms a semi-permanent inorganic covalent bond (9H hardness) with your clear coat that resists acid rain, bird droppings, road salt, and UV oxidation for 3 to 5+ years.',
            ],
            [
                'q' => 'Do I need to book in advance, or do you take drive-ins?',
                'a' => 'We welcome drive-in arrivals for our Express Hand Wash whenever bays are available. For Full Interior Detailing, Paint Correction, and Ceramic Coatings, we strongly suggest booking in advance through our online form or phone to reserve your dedicated technician.',
            ],
            [
                'q' => 'Do you use scratch-safe wash techniques?',
                'a' => 'Always. We follow the two-bucket wash method with grit guards, ultra-plush Korean microfiber wash mitts, pH-neutral lubricating snow foams, and warm filtered de-ionized water that leaves zero water spots.',
            ],
            [
                'q' => 'What if it rains on the day of my appointment?',
                'a' => 'All detailing and ceramic curing processes are performed indoors within our climate-controlled, dust-free LED detailing bays. If the weather is inclement on pickup, we gladly hold your vehicle in our secure indoor showroom until the weather clears.',
            ],
        ];

        $stats = [
            ['value' => '12,400+', 'label' => 'Vehicles Perfected'],
            ['value' => '4.9 / 5', 'label' => 'Google Rating (1.2K+ Reviews)'],
            ['value' => '100%', 'label' => 'Satisfaction Guarantee'],
            ['value' => '15+', 'label' => 'Years Detailing Mastery'],
        ];

        return view('landing', compact('services', 'packages', 'vehicleTypes', 'testimonials', 'faqs', 'stats'));
    }

    /**
     * Handle appointment booking and instant quote request (No database).
     */
    public function bookAppointment(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:100'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'customer_email' => ['nullable', 'email', 'max:100'],
            'vehicle_type' => ['required', 'string'],
            'vehicle_model' => ['nullable', 'string', 'max:100'],
            'service_package' => ['required', 'string'],
            'preferred_date' => ['required', 'date'],
            'preferred_time' => ['required', 'string'],
            'special_notes' => ['nullable', 'string', 'max:500'],
        ]);

        // Generate instant unique reference code
        $referenceCode = 'APX-'.strtoupper(substr(md5(uniqid('', true)), 0, 6));

        $vehicleLabels = [
            'sedan' => 'Coupe / Sedan',
            'crossover' => 'Compact SUV / Crossover',
            'fullsuv' => 'Full SUV / Minivan',
            'truck' => 'Truck / Large 4x4',
            'exotic' => 'Exotic / Supercar',
        ];

        $bookingData = [
            'reference' => $referenceCode,
            'name' => $validated['customer_name'],
            'phone' => $validated['customer_phone'],
            'email' => $validated['customer_email'] ?? 'Not provided',
            'vehicle_type' => $vehicleLabels[$validated['vehicle_type']] ?? ucwords(str_replace('_', ' ', $validated['vehicle_type'])),
            'vehicle_model' => $validated['vehicle_model'] ?: 'Vehicle not specified',
            'package' => $validated['service_package'],
            'date' => date('l, F j, Y', strtotime($validated['preferred_date'])),
            'time' => $validated['preferred_time'],
            'notes' => $validated['special_notes'] ?? 'None',
            'created_at' => now()->format('M j, Y - g:i A'),
        ];

        // Format message for WhatsApp quick contact link
        $waMessage = urlencode(
            "Hello Apex Auto Spa! I just booked an appointment.\n".
            "Ref: {$referenceCode}\n".
            "Name: {$bookingData['name']}\n".
            "Vehicle: {$bookingData['vehicle_type']} ({$bookingData['vehicle_model']})\n".
            "Package: {$bookingData['package']}\n".
            "Preferred: {$bookingData['date']} at {$bookingData['time']}"
        );
        $bookingData['whatsapp_url'] = "https://wa.me/18005550199?text={$waMessage}";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Appointment request submitted successfully!',
                'booking' => $bookingData,
            ]);
        }

        return redirect()->route('home')->with('booking_success', $bookingData);
    }
}

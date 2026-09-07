<?php

namespace Tests\Feature;

use Tests\TestCase;

class CarWashLandingPageTest extends TestCase
{
    /**
     * Test that the car wash landing page renders with correct content.
     */
    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Apex Auto Spa');
        $response->assertSee('Flawless Shine');
        $response->assertSee('Transparent Price Estimator');
        $response->assertSee('Signature Detail');
        $response->assertSee('Ceramic Coating');
    }

    /**
     * Test that appointment booking via web form redirects with session flash.
     */
    public function test_can_submit_appointment_booking(): void
    {
        $payload = [
            'customer_name' => 'Jordan Lee',
            'customer_phone' => '(555) 234-5678',
            'customer_email' => 'jordan@example.com',
            'vehicle_type' => 'sedan',
            'vehicle_model' => '2023 Audi RS5',
            'service_package' => 'Signature Detail',
            'preferred_date' => now()->addDays(2)->format('Y-m-d'),
            'preferred_time' => '10:30 AM (Mid-Morning)',
            'special_notes' => 'Please take extra care of carbon fiber front splitter.',
        ];

        $response = $this->post(route('book.appointment'), $payload);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('booking_success');

        $sessionData = session('booking_success');
        $this->assertStringStartsWith('APX-', $sessionData['reference']);
        $this->assertEquals('Jordan Lee', $sessionData['name']);
        $this->assertEquals('Coupe / Sedan', $sessionData['vehicle_type']);
        $this->assertStringContainsString('https://wa.me/', $sessionData['whatsapp_url']);
    }

    /**
     * Test appointment booking via JSON AJAX request.
     */
    public function test_can_submit_appointment_via_ajax(): void
    {
        $payload = [
            'customer_name' => 'Sarah Connor',
            'customer_phone' => '(555) 987-6543',
            'customer_email' => 'sarah@example.com',
            'vehicle_type' => 'truck',
            'vehicle_model' => 'Ford F-150 Lightning',
            'service_package' => 'Platinum Ceramic & Spa',
            'preferred_date' => now()->addDay()->format('Y-m-d'),
            'preferred_time' => '08:30 AM (Early Bird)',
            'special_notes' => 'Full ceramic coating request.',
        ];

        $response = $this->postJson(route('book.appointment'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Appointment request submitted successfully!',
        ]);
        $response->assertJsonStructure([
            'success',
            'message',
            'booking' => [
                'reference',
                'name',
                'phone',
                'email',
                'vehicle_type',
                'vehicle_model',
                'package',
                'date',
                'time',
                'whatsapp_url',
            ],
        ]);
    }

    /**
     * Test validation failure when required fields are missing.
     */
    public function test_booking_validation_fails_with_missing_fields(): void
    {
        $response = $this->post(route('book.appointment'), []);

        $response->assertSessionHasErrors([
            'customer_name',
            'customer_phone',
            'vehicle_type',
            'service_package',
            'preferred_date',
            'preferred_time',
        ]);
    }
}

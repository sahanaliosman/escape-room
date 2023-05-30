<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\EscapeRoom;
use App\Models\TimeSlot;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class BookingTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    public function guest_cannot_ping()
    {
        $this->json('get', 'api/bookings')->assertStatus(401);
    }

    /**
     * A basic feature test example.
     */
    public function test_booking_crud(): void
    {
        $testEmail = getenv('TEST_EMAIL_API');
        $testPassword = getenv('TEST_PASSWORD_API');

        // log in
        $response = $this->post('/api/auth/login', [
            'email' => $testEmail,
            'password' => $testPassword
        ]);

        $token = $response->assertStatus(200)->decodeResponseJson()['token'];

        // Get bookings
        $response = $this->get('/api/bookings',
            [
                'Authorization' => "Bearer ".$token
            ]);
        $data= $response->assertStatus(200)->decodeResponseJson()['data'];

        // create booking
        $response = $this->post('/api/bookings',
            [
                'Authorization' => "Bearer ".$token,
                'room_id' => 3,
                'time_slot_id' => 7,
                'booking_date' => "2023-07-13",
                'participants' => 2
            ]);
        $status = $response->assertStatus(200)->decodeResponseJson()['status'];
        $this->assertTrue($status);

        // delete last booking
        $booking = Booking::all()->last();
        $response = $this->delete('/api/bookings/'.$booking->id);
        $message = $response->assertStatus(200)->decodeResponseJson()['message'];
        $this->assertStringContainsString($message, "Successfully Deleted");
        $this->assertSoftDeleted($booking);

    }
}

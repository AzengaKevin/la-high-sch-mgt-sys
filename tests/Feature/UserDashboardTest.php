<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        //You forget this faker, migrations and a lot of stuff won't work well
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_an_authenticated_user_can_visit_the_dashboard()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);

        $response->assertViewIs('dashboard');
    }
}

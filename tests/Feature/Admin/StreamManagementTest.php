<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StreamManagementTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void 
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_browse_school_streams()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('admin.streams.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.streams.index');
        $response->assertViewHas('streams');
    }
}

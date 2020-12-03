<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LevelsManagementTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    } 
    public function test_admin_can_browse_all_levels()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('admin.levels.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.levels.index');
        $response->assertViewHas('levels');
    }
}

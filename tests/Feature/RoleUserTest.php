<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleUserTest extends TestCase
{
    use RefreshDatabase;

    /** @group user-role */
    public function test_every_user_has_a_role()
    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create();

        $this->assertNotNull($user->role);

        $this->assertEquals('Default', $user->role->title);
    }

}

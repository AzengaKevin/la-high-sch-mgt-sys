<?php

namespace Tests\Feature\Teacher;

use Tests\TestCase;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileManagementTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->artisan('db:seed --class=TeacherSeeder');
    }

    /** @group teachers */
    public function test_a_teacher_can_view_own_profile()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(Teacher::first(), 'teacher');

        $response = $this->get(route('teacher.me.profile'));

        $response->assertOk();

        $response->assertViewIs('teacher.profile');

        $response->assertViewHas('teacher');
    }
}

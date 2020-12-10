<?php

namespace Tests\Feature\Teacher;

use Tests\TestCase;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        $response = $this->get(route('teacher.me.profile.show'));

        $response->assertOk();

        $response->assertViewIs('teacher.profile');

        $response->assertViewHas('teacher');
    }

    /** @group teachers */
    public function test_a_teacher_can_update_own_profile()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(Teacher::first(), 'teacher');

        $response = $this->patch(route('teacher.me.profile.update', [
            'name' => 'Mr Azenga Kevin',
            'email' => 'azenga.kevin7@gmail.com',
            'phone' => '+254700016349'
        ]));

        $teacher = Teacher::first();

        $this->assertEquals('Mr Azenga Kevin', $teacher->name);
        $this->assertEquals('azenga.kevin7@gmail.com', $teacher->email);
        $this->assertEquals('+254700016349', $teacher->phone);

        $response->assertRedirect(route('teacher.me.profile.show'));

    }

    /** @group teachers */
    public function test_a_teacher_can_update_password()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(Teacher::first(), 'teacher');

        $response = $this->patch(route('teacher.me.password.update', [
            'current_password' => 'password',
            'password' => 'elephant69',
            'password_confirmation' => 'elephant69'
        ]));

        $teacher = Teacher::first();

        $this->assertNotNull($teacher->password);

        $this->assertTrue(Hash::check('elephant69', $teacher->password));

        $response->assertRedirect(route('teacher.me.profile.show'));

        
    }

}

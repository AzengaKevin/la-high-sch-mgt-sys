<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeachersManagmentTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->be(User::factory()->create());
    }

    /** @group teachers */
    public function test_admin_can_browse_teachers()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $this->artisan('db:seed --class=TeacherSeeder');

        //Act 
        $response = $this->get(route('admin.teachers.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.teachers.index');
        $response->assertViewHas('teachers');
    }

    /** @group teachers */
    public function test_admin_can_view_create_teacher_page()
    {
        //Arrange
        $this->withoutExceptionHandling();
        //$teacherData = Teacher::factory()->make()->toArray();

        //Act
        $response = $this->get(route('admin.teachers.create'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.teachers.create');
    }

    /** @group teachers */
    public function test_admin_can_create_teacher()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $teacherData = Teacher::factory()->make()->toArray();

        //Act
        $response = $this->post(route('admin.teachers.store'), $teacherData);

        //Assert
        $this->assertCount(1, Teacher::all());
        $response->assertRedirect(route('admin.teachers.index'));
        
    }

    /** @group teachers */
    public function test_admin_can_view_edit_teacher_page()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $teacher = Teacher::factory()->create();

        //Act
        $response = $this->get(route('admin.teachers.edit', $teacher));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.teachers.edit');
        $response->assertViewHas('teacher');
    }

    /** @group teachers */
    public function test_a_teacher_can_be_successfully_updated()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $teacher = Teacher::factory()->create();

        //Act
        $response = $this->patch(route('admin.teachers.update', $teacher), array_merge(
            $teacher->toArray(),[
                'name' => 'Mr Robert Sasaka',
                'tsc_number' => '386191'
            ]
        ));

        //Assert
        $this->assertEquals('Mr Robert Sasaka', $teacher->fresh()->name);
        $this->assertEquals('386191', $teacher->fresh()->tsc_number);
        $response->assertRedirect(route('admin.teachers.index'));

    }
}


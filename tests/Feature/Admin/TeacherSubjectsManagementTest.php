<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherSubjectsManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @group teachers */
    public function test_admin_can_update_teacher_subjects()
    {
        $this->actingAs(User::factory()->create());

        //Arrange
        $this->withoutExceptionHandling();

        $this->artisan('db:seed --class=SubjectsSeeder');
        $this->artisan('db:seed --class=TeacherSeeder');

        $teacher = Teacher::first();
        $subjectsIds = Subject::whereIn('slug', ['maths', 'comp'])->pluck('id')->toArray();

        //Act
        $response = $this->put(route('admin.teachers.subjects.update', $teacher), [
            'subjects' => $subjectsIds
        ]);

        //Assert
        $this->assertCount(2, $teacher->subjects);

        $response->assertRedirect(route('admin.teachers.show', $teacher));
    }

    /** @group teachers */
    public function test_subjects_required_when_admin_updating_teacher_subjects()
    {
        $this->actingAs(User::factory()->create());

        //Arrange
        $this->artisan('db:seed --class=TeacherSeeder');
        $teacher = Teacher::first();

        //Act
        $response = $this->put(route('admin.teachers.subjects.update', $teacher), []);

        //Assert
        $response->assertSessionHasErrors('subjects');
    }
}

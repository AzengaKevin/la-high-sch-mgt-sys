<?php

namespace Tests\Feature\Teacher;

use Tests\TestCase;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @group teachers */
    public function test_a_teacher_can_view_own_subjects()
    {
        //Arrange
        $this->actingAs($teacher = Teacher::factory()->create(), 'teacher');
        $this->withoutExceptionHandling();
        $this->artisan('db:seed --class=SubjectsSeeder');
        $this->artisan('db:seed --class=DepartmentSeeder');
        $subjects = Subject::findMany([2, 3, 5, 7])->pluck('id')->toArray();
        $teacher->subjects()->attach($subjects);


        //Act
        $response = $this->get(route('teacher.me.subjects.show'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('teacher.subjects');
        $response->assertViewHas('subjects');
    }
}

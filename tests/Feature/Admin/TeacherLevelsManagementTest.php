<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Level;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherLevelsManagementTest extends TestCase
{

    use RefreshDatabase;

    /** @group teachers */
    public function test_admin_can_assign_teacher_classes()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $this->artisan('db:seed');
        $this->actingAs(User::factory()->create());
        
        $teacher = Teacher::first();
        $level = Level::first();
        $subject = Subject::first();
        $stream = Stream::first();

        //Act
        $response = $this->post(route('admin.teachers.levels.store', $teacher), [
            'level_id' => $level->id,
            'stream_id' => $stream->id,
            'subject_id' => $subject->id,
        ]);

        //Assert
        $this->assertCount(1, $teacher->levels);
        $this->assertCount(1, $level->teachers);
        
    }
}

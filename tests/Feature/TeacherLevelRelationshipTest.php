<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Level;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherLevelRelationshipTest extends TestCase
{
    use RefreshDatabase;

    /** @group teachers */
    public function test_a_teacher_can_be_associated_with_teaching_levels()
    {
        //Arrange
        $this->artisan('db:seed');

        $teacher = Teacher::first();
        $level = Level::first();
        $subject = Subject::first();
        $stream = Stream::first();

        //Act
        $teacher->levels()->syncWithoutDetaching([
            $level->id => [
                'stream_id' => $stream->id,
                'subject_id' => $subject->id
            ]
        ]);


        //Assert
        $this->assertCount(1, $teacher->levels);
        $this->assertCount(1, $level->teachers);
    }
}

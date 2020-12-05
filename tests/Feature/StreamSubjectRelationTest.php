<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Stream;
use App\Models\Subject;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StreamSubjectRelationTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_stream_industial_subjects_functionality()
    {
        //Arrange
        $this->artisan('db:seed');
        
        $stream = Stream::firstOrCreate(
            ['slug' => 'blue'],
            ['letter' => 'B', 'name' => 'Blue']
        );

        $subjects = Subject::whereIn('slug', ['bus', 'agric'])->get();

        //Act
        $stream->subjects()->attach($subjects);

        //Assert
        $this->assertCount($subjects->count(), $stream->subjects);
    }
}

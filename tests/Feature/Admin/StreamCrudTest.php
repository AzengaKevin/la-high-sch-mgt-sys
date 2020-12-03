<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\Stream;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StreamCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_stream_can_successfully_created()
    {
        Stream::create([
            'letter' => 'B',
            'slug' => 'blue',
            'name' => 'Blue'
        ]);

        $this->assertCount(1, Stream::all());

        $stream = Stream::first();

        $this->assertEquals('B', $stream->letter);
        $this->assertEquals('blue', $stream->slug);
        $this->assertEquals('Blue', $stream->name);
    }
}

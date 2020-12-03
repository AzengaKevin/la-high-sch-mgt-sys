<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('streams')->insert([
            [
                'letter' => 'B',
                'slug' => 'blue',
                'name' => 'Blue'
            ],
            [
                'letter' => 'G',
                'slug' => 'green',
                'name' => 'Green'
            ],
            [
                'letter' => 'R',
                'slug' => 'red',
                'name' => 'Red'
            ],
            [
                'letter' => 'W',
                'slug' => 'white',
                'name' => 'White'
            ],
            [
                'letter' => 'Y',
                'slug' => 'yellow',
                'name' => 'Yellow'
            ],
        ]);
    }
}

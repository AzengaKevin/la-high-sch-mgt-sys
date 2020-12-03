<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->create(['name' => 'Mr. Azenga Kevin', 'email' => 'azenga.kevin7@gmail.com']);
    }
}

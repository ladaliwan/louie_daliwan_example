<?php

use App\AccessLevel;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $access_level = AccessLevel::first();

        User::firstOrCreate([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'age' => '25',
            'birth_date' => Carbon::now()->format('Y-m-d'),
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'job_title' => 'Director',
            'access_level_id' => $access_level->id,
            'is_default' => true
        ]);
    }
}

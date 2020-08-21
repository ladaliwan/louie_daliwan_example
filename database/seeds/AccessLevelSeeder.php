<?php

use App\AccessLevel;
use Illuminate\Database\Seeder;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccessLevel::firstOrCreate(['description' => 'SuperUser']);
    }
}

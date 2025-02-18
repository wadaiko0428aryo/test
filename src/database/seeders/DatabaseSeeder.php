<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeightLog;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        WeightLog::factory(35)->create();
    }
}
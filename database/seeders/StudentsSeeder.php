<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    public function run(): void
    {
        Students::factory()->count(10)->create();
    }
}

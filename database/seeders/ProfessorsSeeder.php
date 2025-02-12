<?php


namespace Database\Seeders;

use App\Models\Professors;
use Illuminate\Database\Seeder;

class ProfessorsSeeder extends Seeder
{
    public function run(): void
    {
        Professors::factory()->count(10)->create();
    }
}

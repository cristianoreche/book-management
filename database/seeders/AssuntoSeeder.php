<?php

namespace Database\Seeders;

use App\Models\Assunto;
use Illuminate\Database\Seeder;

class AssuntoSeeder extends Seeder
{
    public function run(): void
    {
        Assunto::factory(10)->create();
    }
}

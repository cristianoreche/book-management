<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AssuntoSeeder::class,
            AutorSeeder::class,
            LivroSeeder::class,
        ]);
    }
}

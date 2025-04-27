<?php

namespace Database\Seeders;

use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivroSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Livro::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Livro::factory(20)->create()->each(function ($livro) {
            $autores = Autor::inRandomOrder()
                ->take(rand(1, 3))
                ->pluck('id')
                ->toArray();

            $livro->autores()->sync($autores);
        });
    }
}

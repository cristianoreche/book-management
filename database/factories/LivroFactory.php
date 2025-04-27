<?php

namespace Database\Factories;

use App\Models\Livro;
use App\Models\Assunto;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivroFactory extends Factory
{
    protected $model = Livro::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'valor' => $this->faker->randomFloat(2, 10, 500),
            'assunto_id' => Assunto::factory(),
        ];
    }
}

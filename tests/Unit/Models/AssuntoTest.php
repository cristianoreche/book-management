<?php

namespace Tests\Unit\Models;

use App\Models\Assunto;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssuntoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function assunto_pode_ter_varios_livros()
    {
        // Cria o assunto
        $assunto = Assunto::factory()->create();

        // Cria 3 livros vinculados ao assunto
        $livros = Livro::factory()
            ->count(3)
            ->create(['assunto_id' => $assunto->id]);

        // Verifica o relacionamento
        $this->assertCount(3, $assunto->fresh()->livros);
        $this->assertInstanceOf(Livro::class, $assunto->livros->first());

        // Verifica se os IDs correspondem
        $this->assertEquals(
            $livros->pluck('id')->sort()->values()->toArray(),
            $assunto->livros->pluck('id')->sort()->values()->toArray()
        );
    }

    /** @test */
    public function nome_do_assunto_e_obrigatorio()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        Assunto::factory()->create(['nome' => null]);
    }
}

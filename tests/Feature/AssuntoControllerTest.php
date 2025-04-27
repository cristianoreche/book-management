<?php

namespace Tests\Feature;

use App\Models\Assunto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssuntoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usuario_pode_ver_a_lista_de_assuntos()
    {
        $assunto = Assunto::factory()->create();

        $response = $this->get(route('assuntos.index'));

        $response->assertStatus(200);
        $response->assertViewIs('assuntos.index');
        $response->assertSee($assunto->nome);
    }

    /** @test */
    public function usuario_pode_acessar_pagina_de_criacao_de_assunto()
    {
        $response = $this->get(route('assuntos.create'));

        $response->assertStatus(200);
        $response->assertViewIs('assuntos.create');
    }

    /** @test */
    public function usuario_pode_criar_um_assunto()
    {
        $data = ['nome' => 'Assunto Teste'];

        $response = $this->post(route('assuntos.store'), $data);

        $response->assertRedirect(route('assuntos.index'));
        $this->assertDatabaseHas('assuntos', $data);
    }

    /** @test */
    public function usuario_pode_ver_pagina_de_edicao_de_assunto()
    {
        $assunto = Assunto::factory()->create();

        $response = $this->get(route('assuntos.edit', $assunto));

        $response->assertStatus(200);
        $response->assertViewIs('assuntos.edit');
        $response->assertViewHas('assunto', $assunto);
    }

    /** @test */
    public function usuario_pode_editar_um_assunto()
    {
        $assunto = Assunto::factory()->create();
        $data = ['nome' => 'Assunto Atualizado'];

        $response = $this->put(route('assuntos.update', $assunto), $data);

        $response->assertRedirect(route('assuntos.index'));
        $this->assertDatabaseHas('assuntos', $data);
    }

    /** @test */
    public function nome_do_assunto_e_obrigatorio()
    {
        $response = $this->post(route('assuntos.store'), []);

        $response->assertSessionHasErrors(['nome']);
    }
}

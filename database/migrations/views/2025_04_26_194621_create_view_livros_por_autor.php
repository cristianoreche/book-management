<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW view_livros_por_autor AS
            SELECT
                autores.id AS autor_id,
                autores.nome AS autor_nome,
                livros.id AS livro_id,
                livros.titulo AS livro_titulo,
                livros.valor AS livro_valor
            FROM
                autores
            INNER JOIN
                autor_livro ON autores.id = autor_livro.autor_id
            INNER JOIN
                livros ON autor_livro.livro_id = livros.id
            ORDER BY autores.nome ASC
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_livros_por_autor");
    }
};

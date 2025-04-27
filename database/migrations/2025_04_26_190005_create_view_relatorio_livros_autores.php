<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {

            DB::statement('
            CREATE VIEW view_relatorio_livros_autores AS
            SELECT
                a.id AS autor_id,
                a.nome AS autor_nome,
                l.id AS livro_id,
                l.titulo AS livro_titulo,
                l.valor AS livro_valor,
                l.created_at AS livro_data_cadastro,
                ass.id AS assunto_id,
                ass.nome AS assunto_nome
            FROM
                autor_livro al
            JOIN autores a ON al.autor_id = a.id
            JOIN livros l ON al.livro_id = l.id
            JOIN assuntos ass ON l.assunto_id = ass.id
            ORDER BY a.nome, l.titulo
        ');
        } else {

            DB::statement('
            CREATE VIEW view_relatorio_livros_autores AS
            SELECT
                a.id AS autor_id,
                a.nome AS autor_nome,
                l.id AS livro_id,
                l.titulo AS livro_titulo,
                l.valor AS livro_valor,
                l.created_at AS livro_data_cadastro,
                ass.id AS assunto_id,
                ass.nome AS assunto_nome,
                COUNT(*) OVER (PARTITION BY a.id) AS total_livros_autor,
                SUM(l.valor) OVER (PARTITION BY a.id) AS valor_total_autor
            FROM
                autor_livro al
            JOIN autores a ON al.autor_id = a.id
            JOIN livros l ON al.livro_id = l.id
            JOIN assuntos ass ON l.assunto_id = ass.id
            ORDER BY a.nome, l.titulo
        ');
        }
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS view_relatorio_livros_autores');
    }
};

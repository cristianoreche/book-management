<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewLivroPorAutor extends Model
{
    protected $table = 'view_relatorio_livros_autores';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'livro_data_cadastro' => 'datetime',
        'livro_valor' => 'decimal:2',
        'valor_total_autor' => 'decimal:2'
    ];
}

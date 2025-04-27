<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'valor', 'assunto_id'];

    public function assunto(): BelongsTo
    {
        return $this->belongsTo(Assunto::class, 'assunto_id');
    }

    public function autores(): BelongsToMany
    {
        return $this->belongsToMany(
            Autor::class,
            'autor_livro',
            'livro_id',
            'autor_id'
        )->withTimestamps();
    }
}

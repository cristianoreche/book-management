<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assunto extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function livros(): HasMany
    {
        return $this->hasMany(Livro::class);
    }

    public function autores()
    {
        return $this->hasMany(Autor::class);
    }

}

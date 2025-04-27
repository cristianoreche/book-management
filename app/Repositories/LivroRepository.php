<?php

namespace App\Repositories;

use App\Models\Livro;

class LivroRepository
{
    public function allWithRelations()
    {
        return Livro::with(['autores', 'assunto'])->get();
    }

    public function find($id)
    {
        return Livro::with(['autores', 'assunto'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Livro::create($data);
    }

    public function update($id, array $data)
    {
        $livro = Livro::findOrFail($id);
        $livro->update($data);
        return $livro;
    }

    public function delete($id)
    {
        return Livro::destroy($id);
    }
}

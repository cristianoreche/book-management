<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\Assunto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class LivroController extends Controller
{
    public function index()
    {
        try {
            $livros = Livro::with(['assunto', 'autores'])->paginate(10)->withQueryString();

            $livros->transform(function ($livro) {
                $livro->autores_nomes = $livro->autores->pluck('nome')->join(', ');
                return $livro;
            });

            return view('livros.index', compact('livros'));
        } catch (QueryException $e) {
            report($e);
            return back()->with('error', 'Erro ao carregar a lista de livros.');
        }
    }


    public function create()
    {
        try {
            $assuntos = Assunto::all();
            $autores = Autor::all();

            return view('livros.create', compact('assuntos', 'autores'));

        } catch (QueryException $e) {
            report($e);
            return back()->with('error', 'Erro ao carregar os assuntos.');
        }
    }

    public function store(LivroRequest $request)
    {
        try {
            $livro = Livro::create($request->only(['titulo', 'valor', 'assunto_id']));

            if ($request->filled('autores')) {
                $livro->autores()->sync($request->input('autores'));
            }

            return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Erro ao salvar o livro.');
        }
    }

    public function edit($id)
    {
        try {
            $livro = Livro::with('autores')->findOrFail($id);
            $assuntos = Assunto::all();
            $autores = Autor::all();

            return view('livros.edit', compact('livro', 'assuntos', 'autores'));

        } catch (ModelNotFoundException $e) {
            return redirect()->route('livros.index')->with('error', 'Livro não encontrado.');
        } catch (QueryException $e) {
            report($e);
            return redirect()->route('livros.index')->with('error', 'Erro ao carregar o livro para edição.');
        }
    }

    public function update(LivroRequest $request, $id)
    {
        try {
            $livro = Livro::findOrFail($id);
            $livro->update($request->only(['titulo', 'valor', 'assunto_id']));
            $livro->autores()->sync($request->autores);
            return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('livros.index')->with('error', 'Livro não encontrado.');
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Erro ao atualizar o livro.');
        }
    }
    public function destroy($id)
    {
        try {
            $livro = Livro::findOrFail($id);
            $livro->delete();

            return redirect()->route('livros.index')->with('success', 'Livro removido com sucesso!');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('livros.index')->with('error', 'Livro não encontrado para exclusão.');
        } catch (QueryException $e) {
            report($e);
            return redirect()->route('livros.index')->with('error', 'Erro ao excluir o livro.');
        }
    }
}

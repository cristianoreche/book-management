<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::paginate(10)->withQueryString();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        try {
            Autor::create($request->only('nome'));
            return redirect()->route('autores.index')->with('success', 'Autor criado com sucesso!');
        } catch (QueryException $e) {
            report($e);
            return back()->with('error', 'Erro ao criar autor.');
        }
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        try {
            $autor->update($request->only('nome'));
            return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso!');
        } catch (QueryException $e) {
            report($e);
            return back()->with('error', 'Erro ao atualizar autor.');
        }
    }

    public function destroy(Autor $autor)
    {
        try {
            $autor->delete();
            return redirect()->route('autores.index')->with('success', 'Autor excluído com sucesso!');
        } catch (QueryException $e) {
            report($e);
            return back()->with('error', 'Erro ao excluir autor.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoRequest;
use App\Models\Assunto;
use Illuminate\Database\QueryException;

class AssuntoController extends Controller
{
    public function index()
    {
        $assuntos = Assunto::paginate(10)->withQueryString();
        return view('assuntos.index', compact('assuntos'));
    }

    public function create()
    {
        return view('assuntos.create');
    }

    public function store(AssuntoRequest $request)
    {
        try {
            Assunto::create($request->validated());
            return redirect()->route('assuntos.index')->with('success', 'Assunto criado com sucesso!');
        } catch (QueryException $e) {
            report($e);
            return back()->with('error', 'Erro ao criar assunto.');
        }
    }

    public function edit(Assunto $assunto)
    {
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(AssuntoRequest $request, Assunto $assunto)
    {
        try {
            $assunto->update($request->validated());
            return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso!');
        } catch (QueryException $e) {
            report($e);
            return back()->with('error', 'Erro ao atualizar assunto.');
        }
    }

    public function destroy(Assunto $assunto)
    {
        try {
            $assunto->autores()->delete();
            $assunto->delete();

            return redirect()->route('assuntos.index')
                ->with('success', 'Assunto excluído com sucesso!');
        } catch (QueryException $e) {
            report($e);
            return back()->with('error', 'Erro ao excluir assunto.');
        }
    }

}

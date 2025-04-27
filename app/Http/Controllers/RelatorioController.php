<?php

namespace App\Http\Controllers;

use App\Models\ViewLivroPorAutor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $query = $this->aplicarFiltros($request);
        $relatorio = $query->get()->groupBy('autor_id');

        return view('relatorios.index', [
            'relatorio' => $relatorio,
            'filtros' => $request->query()
        ]);
    }

    public function exportar(Request $request)
    {
        $query = $this->aplicarFiltros($request);
        $relatorio = $query->get()->groupBy('autor_id');

        $pdf = Pdf::loadView('relatorios.export', [
            'relatorio' => $relatorio,
            'titulo' => 'Relatório de Livros por Autor - ' . now()->format('d/m/Y')
        ]);

        return $pdf->download('relatorio_livros_autores_'.now()->format('Ymd_His').'.pdf');
    }

    private function aplicarFiltros(Request $request)
    {
        return ViewLivroPorAutor::query()
            ->when($request->autor, fn($q, $autor) => $q->where('autor_nome', 'LIKE', "%{$autor}%"))
            ->when($request->assunto, fn($q, $assunto) => $q->where('assunto_nome', 'LIKE', "%{$assunto}%"))
            ->when($request->valor_min, fn($q, $valor) => $q->where('livro_valor', '>=', $valor))
            ->when($request->valor_max, fn($q, $valor) => $q->where('livro_valor', '<=', $valor))
            ->orderBy('autor_nome')
            ->orderBy('livro_titulo');
    }
}

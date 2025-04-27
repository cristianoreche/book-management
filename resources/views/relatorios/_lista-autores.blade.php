@forelse ($relatorio as $autorId => $livros)
    @php
        $autor = $livros->first();
    @endphp

    <div class="report__author">
        <div class="report__author-header">
            <h3 class="report__author-name">{{ $autor->autor_nome }}</h3>
            <span class="report__author-count">
                {{ $autor->total_livros_autor }} livros -
                Total: R$ {{ number_format($autor->valor_total_autor, 2, ',', '.') }}
            </span>
        </div>

        <table class="report__table">
            <thead class="report__table-head">
            <tr class="report__table-row">
                <th class="report__table-header">Título</th>
                <th class="report__table-header report__table-header--right">Valor</th>
                <th class="report__table-header">Assunto</th>
                <th class="report__table-header report__table-header--center">Cadastro</th>
            </tr>
            </thead>
            <tbody class="report__table-body">
            @foreach ($livros as $livro)
                <tr class="report__table-row">
                    <td class="report__table-cell">{{ $livro->livro_titulo }}</td>
                    <td class="report__table-cell report__table-cell--right">
                        R$ {{ number_format($livro->livro_valor, 2, ',', '.') }}
                    </td>
                    <td class="report__table-cell">{{ $livro->assunto_nome }}</td>
                    <td class="report__table-cell report__table-cell--center">
                        {{ $livro->livro_data_cadastro ? $livro->livro_data_cadastro->format('d/m/Y') : 'N/A' }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@empty
    <div class="report__empty">
        <i class="lucide lucide-alert-circle"></i>
        Nenhum resultado encontrado com os filtros aplicados.
    </div>
@endforelse

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $titulo }}</title>
    <style>
        /* Reset e configurações básicas */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 10pt;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Container principal */
        .report {
            max-width: 100%;
            margin: 0 auto;
            padding: 0;
        }

        /* Cabeçalho do relatório */
        .report__header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #2c3e50;
        }

        .report__title {
            font-size: 18pt;
            font-weight: 600;
            color: #2c3e50;
            margin: 0 0 5px 0;
        }

        .report__date {
            font-size: 9pt;
            color: #7f8c8d;
        }

        /* Seção de cada autor */
        .report__author {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }

        .report__author-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 8px 12px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }

        .report__author-name {
            font-size: 12pt;
            font-weight: 600;
            color: #2980b9;
            margin: 0;
        }

        .report__author-count {
            font-size: 10pt;
            font-weight: 500;
            color: #27ae60;
        }

        /* Estilos da tabela */
        .report__table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .report__table-header {
            background-color: #2c3e50;
            color: white;
            padding: 8px 10px;
            text-align: left;
            font-size: 9pt;
            font-weight: 600;
            text-transform: uppercase;
        }

        .report__table-header--right {
            text-align: right;
        }

        .report__table-header--center {
            text-align: center;
        }

        .report__table-cell {
            padding: 8px 10px;
            border-bottom: 1px solid #ecf0f1;
            font-size: 9pt;
            vertical-align: top;
        }

        .report__table-cell--right {
            text-align: right;
        }

        .report__table-cell--center {
            text-align: center;
        }

        .report__table-row:nth-child(even) {
            background-color: #f8f9fa;
        }

        .report__value {
            font-weight: 600;
            color: #27ae60;
        }

        .report__footer {
            margin-top: 30px;
            padding-top: 10px;
            font-size: 8pt;
            text-align: center;
            color: #7f8c8d;
            border-top: 1px solid #bdc3c7;
        }

        .page-break {
            page-break-after: always;
        }

        @media print {
            body {
                font-size: 9pt;
            }

            .report__header {
                padding-top: 0;
            }

            .report__table-header {
                background-color: #2c3e50 !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
<div class="report">
    <div class="report__header">
        <h1 class="report__title">{{ $titulo }}</h1>
        <div class="report__date">Emitido em: {{ now()->format('d/m/Y H:i:s') }}</div>
    </div>

    @foreach ($relatorio as $autorId => $livros)
        @php
            $autor = $livros->first();
        @endphp

        <div class="report__author">
            <div class="report__author-header">
                <h3 class="report__author-name">{{ $autor->autor_nome }}</h3>
                <span class="report__author-count">
                        {{ $autor->total_livros_autor }} livros -
                        Total: <span class="report__value">R$ {{ number_format($autor->valor_total_autor, 2, ',', '.') }}</span>
                    </span>
            </div>

            <table class="report__table">
                <thead>
                <tr>
                    <th class="report__table-header">Título</th>
                    <th class="report__table-header report__table-header--right">Valor</th>
                    <th class="report__table-header">Assunto</th>
                    <th class="report__table-header report__table-header--center">Cadastro</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($livros as $livro)
                    <tr class="report__table-row">
                        <td class="report__table-cell">{{ $livro->livro_titulo }}</td>
                        <td class="report__table-cell report__table-cell--right report__value">
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

        @if(!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach

    <div class="report__footer">
        Relatório gerado por {{ config('app.name') }} - {{ url('/') }}
    </div>
</div>
</body>
</html>

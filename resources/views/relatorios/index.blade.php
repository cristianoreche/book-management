@extends('layouts.app')

@section('title', 'Relatório de Livros por Autor')

@section('content')
    <div class="page">
        <div class="page__header">
            <h1 class="page__title">
                <i class="lucide lucide-library-big"></i>
                Relatório de Livros por Autor
            </h1>
        </div>
        <div class="page__body">
            @include('relatorios._filtros')
            <div class="report">
                @include('relatorios._lista-autores', ['relatorio' => $relatorio])
            </div>
        </div>
    </div>
@endsection

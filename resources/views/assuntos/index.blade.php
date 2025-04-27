@extends('layouts.app')

@section('title', 'Assuntos')

@section('content')
    <section class="page">
        <div class="page__header">
            <div class="page__header-content">
                <h2 class="page__title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-library-big-icon lucide-library-big"><rect width="8" height="18" x="3" y="3" rx="1"/><path d="M7 3v18"/><path d="M20.4 18.9c.2.5-.1 1.1-.6 1.3l-1.9.7c-.5.2-1.1-.1-1.3-.6L11.1 5.1c-.2-.5.1-1.1.6-1.3l1.9-.7c.5-.2 1.1.1 1.3.6Z"/></svg>
                    Lista de Assuntos
                </h2>

                <div class="page__header-actions">
                    <a href="{{ route('assuntos.create') }}" class="button button--success">Novo Assunto</a>
                </div>
            </div>
        </div>
        <div class="page__header-search">
            <x-search
                action="{{ route('assuntos.index') }}"
                name="search"
                placeholder="Buscar assuntos..."
            />
        </div>
        <div class="page__body" id="assuntos-table">
            <x-table
                :columns="[
                     'nome' => 'Título',
                    ]"
                    :items="$assuntos->map(function($item) {
                    $item->resource_route = 'assuntos';
                     return $item;
                    })"
                :actions="true"
            />
        </div>

        <div class="page__pagination">
            <x-pagination :paginator="$assuntos" />
        </div>
    </section>
@endsection


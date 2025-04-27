@extends('layouts.app')

@section('title', 'Cadastrar Livro')

@section('content')
    <section class="form">
        <h2 class="form__title">Cadastrar Novo Livro</h2>

        <form method="POST" action="{{ route('livros.store') }}" class="form__body">
            @csrf

            <x-input
                label="Título"
                name="titulo"
                placeholder="Ex: O Senhor dos Anéis"
                required
            />

            <x-input
                label="Valor"
                name="valor"
                type="text"
                placeholder="Ex: R$ 79,90"
                class="money-mask"
                :value="old('valor')"
                required
            />

            <div class="form__group">
                @if ($assuntos->isEmpty())
                    <x-select
                        label="Assunto"
                        name="assunto_id"
                        :options="[]"
                        disabled
                    />
                    <small class="input__error">
                        Nenhum assunto cadastrado. <a href="{{ route('assuntos.create') }}">Cadastre agora</a>.
                    </small>
                @else
                    <x-select
                        label="Assunto"
                        name="assunto_id"
                        :options="$assuntos->pluck('nome', 'id')"
                        required
                    />
                @endif
            </div>

            <div class="form__group">
                @if ($autores->isEmpty())
                    <x-select
                        label="Autor(es)"
                        name="autores"
                        :options="[]"
                        disabled
                    />
                    <small class="input__error">
                        Nenhum autor cadastrado. <a href="{{ route('autores.create') }}">Cadastre agora</a>.
                    </small>
                @else
                    <x-multi-select
                        name="autores[]"
                        label="Autor(es)"
                        :options="$autores->pluck('nome', 'id')->toArray()"
                        :selected="old('autores', [])"
                    />
                @endif
            </div>

            <div class="form__actions">
                <x-button type="submit" variant="success">
                    Salvar
                </x-button>

                <a href="{{ route('livros.index') }}" class="button button--danger">
                    Cancelar
                </a>
            </div>
        </form>
    </section>
@endsection

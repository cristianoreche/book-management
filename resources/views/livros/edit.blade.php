@extends('layouts.app')

@section('title', 'Editar Livro')

@section('content')
    <section class="form">
        <h2 class="form__title">Editar Livro</h2>

        <form method="POST" action="{{ route('livros.update', $livro->id) }}" class="form__body">
            @csrf
            @method('PUT')

            <x-input
                label="Título"
                name="titulo"
                placeholder="Ex: O Senhor dos Anéis"
                :value="old('titulo', $livro->titulo)"
                required
            />

            <x-input
                label="Valor"
                name="valor"
                type="text"
                placeholder="Ex: R$ 79,90"
                class="money-mask"
                :value="old('valor', number_format($livro->valor ?? 0, 2, ',', '.'))"
                required
            />

            <div class="form__group">
                <x-select
                    label="Assunto"
                    name="assunto_id"
                    :options="$assuntos->pluck('nome', 'id')"
                    :selected="old('assunto_id', $livro->assunto_id)"
                    required
                />
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
                        label="Autor(es)"
                        name="autores"
                        :options="$autores->pluck('nome', 'id')->toArray()"
                        :selected="old('autores', $livro->autores->pluck('id')->toArray())"
                    />
                @endif
            </div>

            <div class="form__actions">
                <x-button type="submit" variant="success">
                    Atualizar
                </x-button>

                <a href="{{ route('livros.index') }}" class="button button--danger">
                    Cancelar
                </a>
            </div>
        </form>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Editar Autor')

@section('content')
    <section class="form">
        <h2 class="form__title">Editar Autor</h2>

        <form action="{{ route('autores.update', $autor) }}" method="POST" class="form__body">
            @csrf
            @method('PUT')

            <x-input
                label="Nome"
                name="nome"
                placeholder="Ex: Machado de Assis"
                :value="old('nome', $autor->nome)"
                required
            />

            <div class="form__actions">
                <x-button type="submit" variant="success">Atualizar</x-button>
                <a href="{{ route('autores.index') }}" class="button button--danger">Cancelar</a>
            </div>
        </form>
    </section>
@endsection

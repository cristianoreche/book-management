@extends('layouts.app')

@section('title', 'Cadastrar Autor')

@section('content')
    <section class="form">
        <h2 class="form__title">Cadastrar Novo Autor</h2>

        <form action="{{ route('autores.store') }}" method="POST" class="form__body">
            @csrf

            <x-input
                label="Nome"
                name="nome"
                placeholder="Ex: Machado de Assis"
                required
            />

            <div class="form__actions">
                <x-button type="submit" variant="success">Salvar</x-button>
                <a href="{{ route('autores.index') }}" class="button button--danger">Cancelar</a>
            </div>
        </form>
    </section>
@endsection

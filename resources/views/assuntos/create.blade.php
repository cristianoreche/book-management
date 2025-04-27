@extends('layouts.app')

@section('title', 'Cadastrar Assunto')

@section('content')
    <div class="form">
        <h2 class="form__title">Cadastrar Novo Assunto</h2>

        <form action="{{ route('assuntos.store') }}" method="POST" class="form__body">
            @csrf

            <div class="form__group">
                <x-input
                    label="Título"
                    name="nome"
                    placeholder="Ex: Literatura Brasileira"
                    required
                />
            </div>

            <div class="form__actions">
                <x-button type="submit" variant="success">
                    Salvar
                </x-button>

                <a href="{{ route('assuntos.index') }}" class="button button--danger">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection

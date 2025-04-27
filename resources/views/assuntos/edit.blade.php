@extends('layouts.app')

@section('title', 'Editar Assunto')

@section('content')
    <div class="form">
        <h2 class="form__title">Editar Assunto</h2>

        <form action="{{ route('assuntos.update', $assunto->id) }}" method="POST" class="form__body">
            @csrf
            @method('PUT')

            <div class="form__group">
                <x-input
                    label="Título"
                    name="nome"
                    placeholder="Ex: Literatura Brasileira"
                    :value="old('nome', $assunto->nome)"
                    required
                />
            </div>

            <div class="form__actions">
                <x-button type="submit" variant="success">
                    Atualizar
                </x-button>

                <a href="{{ route('assuntos.index') }}" class="button button--danger">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection

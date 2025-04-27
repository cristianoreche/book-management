<div class="filters">
    <form method="GET" class="filters__form">
        <div class="filters__row">
            <div class="filters__group">
                <label class="filters__label">Autor</label>
                <input type="text"
                       name="autor"
                       class="filters__input"
                       value="{{ request('autor') }}"
                       placeholder="Filtrar por autor">
            </div>

            <div class="filters__group">
                <label class="filters__label">Assunto</label>
                <input type="text"
                       name="assunto"
                       class="filters__input"
                       value="{{ request('assunto') }}"
                       placeholder="Filtrar por assunto">
            </div>

            <div class="filters__group">
                <label class="filters__label">Valor Mínimo</label>
                <input type="number"
                       step="0.01"
                       name="valor_min"
                       class="filters__input"
                       value="{{ request('valor_min') }}"
                       placeholder="R$ 0,00">
            </div>

            <div class="filters__group">
                <label class="filters__label">Valor Máximo</label>
                <input type="number"
                       step="0.01"
                       name="valor_max"
                       class="filters__input"
                       value="{{ request('valor_max') }}"
                       placeholder="R$ 0,00">
            </div>

            <div class="filters__actions">
                <button type="submit" class="button button--primary">
                    <i class="lucide lucide-filter"></i> Filtrar
                </button>

                <a href="{{ route('relatorios.livros-por-autor') }}" class="button button--secondary">
                    <i class="lucide lucide-x"></i> Limpar
                </a>

                <button type="submit"
                        formaction="{{ route('relatorios.exportar') }}"
                        class="button button--success">
                    <i class="lucide lucide-file-text"></i> Exportar
                </button>
            </div>
        </div>
    </form>
</div>
